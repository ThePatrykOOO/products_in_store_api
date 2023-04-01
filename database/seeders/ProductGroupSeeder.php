<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductGroup;
use Illuminate\Database\Seeder;

class ProductGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parentProducts = Product::query()->inRandomOrder()->limit(2000)->get();

        foreach ($parentProducts as $parentProduct) {
            $childProduct = Product::query()->inRandomOrder()->first();

            ProductGroup::factory()->create(
                [
                    'parent_id' => $parentProduct->id,
                    'child_id' => $childProduct->id,
                ]
            );
        }
    }
}
