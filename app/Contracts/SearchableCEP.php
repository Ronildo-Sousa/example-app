<?php

namespace App\Contracts;

use Exception;
use Illuminate\Support\Collection;

interface SearchableCEP 
{
    public function handle(string $search): array|string;
}