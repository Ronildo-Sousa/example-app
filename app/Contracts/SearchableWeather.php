<?php

namespace App\contracts;

use Illuminate\Support\Collection;

interface SearchableWeather 
{
    public function handle(string $search): Collection;
}