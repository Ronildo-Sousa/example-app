<?php

namespace App\contracts;

use Illuminate\Support\Collection;

interface SearchableCEP 
{
    public function handle(string $search): Collection;
}