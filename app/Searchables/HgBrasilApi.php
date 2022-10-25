<?php

namespace App\Searchables;

use App\Contracts\SearchableWeather;
use Exception;
use Illuminate\Support\Facades\Http;

class HgBrasilApi implements SearchableWeather
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = "https://api.hgbrasil.com/weather?array_limit=1
                            &fields=temp,description,humidity,wind_speedy
                            &key=".env('HG_API_KEY')."&city_name=";
    }

    public function handle(string $search): array|string
    {
        try {
            $response = Http::get($this->baseUrl . $search)->collect();
            dd($response);    
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}