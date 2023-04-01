<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $products = Product::query()
            ->paginate($request->get('per_page', 25));
        return new JsonResponse($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): JsonResponse
    {
        /** @var Product $product */
        $product = Product::query()->create($request->validated());
        $product->productGroups()->attach($request->get('product_groups_ids', []));

        return new JsonResponse($product, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): JsonResponse
    {
        return new JsonResponse($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): JsonResponse
    {
        $product->update($request->validated());
        $product->productGroups()->sync($request->get('product_groups_ids', []));

        return new JsonResponse($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->productGroups()->sync([]);
        $product->delete();
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
