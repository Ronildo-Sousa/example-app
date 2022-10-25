<?php

namespace App\Actions;

use App\Contracts\SearchableCEP;
use App\Contracts\SearchableWeather;
use App\Searchables\HgBrasilApi;
use App\Searchables\ViaCepApi;

class SearchAction
{
    public function run(string $search, SearchableCEP $searchableCEP = (new ViaCepApi), SearchableWeather $searchableWeather = (new HgBrasilApi))
    {
        // $dataCEP = $searchableCEP->handle($search);   
        $searchableWeather->handle('berilo');
    }
}