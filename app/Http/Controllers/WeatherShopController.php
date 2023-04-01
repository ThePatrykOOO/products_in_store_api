<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class WeatherShopController extends Controller
{
    public function getWeatherByShop(Shop $shop)
    {
        return Cache::remember('shop_weather_'.$shop->id, 60, function () use ($shop) {
            $url = sprintf(
                "https://api.open-meteo.com/v1/forecast?latitude=%s&longitude=%s&current_weather=true",
                $shop->latitude,
                $shop->longitude
            );
            return Http::get($url)->json();
        });
    }
}
