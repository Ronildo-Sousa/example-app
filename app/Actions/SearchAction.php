<?php

namespace App\Actions;

use App\Contracts\SearchableCEP;
use App\Contracts\SearchableWeather;
use App\Models\Search;
use App\Searchables\HgBrasilApi;
use App\Searchables\ViaCepApi;

class SearchAction
{
    public function run(string $search, SearchableCEP $searchableCEP = (new ViaCepApi), SearchableWeather $searchableWeather = (new HgBrasilApi)): Search
    {
        $dataCEP = $searchableCEP->handle($search);
        $dataWeather = $searchableWeather->handle($dataCEP['city']);

        return Search::query()->create([
            'user_id' => auth()->id(),
            'CEP' => $search,
            'city' => $dataCEP['city'],
            'public_place' => $dataCEP['public_place'],
            'weather' => $dataWeather['weather'],
            'temperature' => $dataWeather['temperature'],
            'moisture' => $dataWeather['moisture'],
            'air_speed' => $dataWeather['air_speed'],
            'ip_address' => request()->ip()
        ]);
    }
}
