<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shopIds = collect(Shop::query()->pluck('id')->toArray());


        for ($i = 0; $i < 45_000; $i++) {
            Product::factory()->create(
                [
                    'shop_id' => $shopIds->random()
                ]
            );
        }
    }
}
