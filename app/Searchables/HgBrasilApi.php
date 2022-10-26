<?php

namespace App\Searchables;

use App\Contracts\SearchableWeather;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class HgBrasilApi implements SearchableWeather
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = "https://api.hgbrasil.com/weather?array_limit=1
                            &fields=temp,description,humidity,wind_speedy
                            &key=" . env('HG_API_KEY') . "&city_name=";
    }

    public function handle(string $search): array|string
    {   
        try {
            $response = Http::get($this->baseUrl . $search)->collect();
            return [
                'weather' => $response['results']['description'],
                'temperature' => strval($response['results']['temp']),
                'moisture' => strval($response['results']['humidity']),
                'air_speed' => str_replace(' ','',str_replace('km/h', '', $response['results']['wind_speedy']))
            ];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
