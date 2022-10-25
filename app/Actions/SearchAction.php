<?php

namespace App\Actions;

use App\contracts\SearchableCEP;
use App\contracts\SearchableWeather;

class SearchAction
{
    public function run(SearchableCEP $searchableCEP, string $search)
    {
        dd($searchableCEP->handle($search));   
    }
}