<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $shops = Shop::query()
            ->paginate($request->get('per_page', 25));
        return new JsonResponse($shops);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShopRequest $request): JsonResponse
    {
        $shop = Shop::query()->create($request->validated());
        return new JsonResponse($shop, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop): JsonResponse
    {
        return new JsonResponse($shop);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShopRequest $request, Shop $shop): JsonResponse
    {
        $shop->update($request->validated());
        return new JsonResponse($shop);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
