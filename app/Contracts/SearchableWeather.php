<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface SearchableWeather 
{
    public function handle(string $search): array|string;
}