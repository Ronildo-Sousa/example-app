<?php

namespace App\Searchables;

use Exception;
use Illuminate\Support\Facades\Http;
use App\Contracts\SearchableCEP;
use Illuminate\Support\Collection;

class ViaCepApi implements SearchableCEP
{
    private string $baseUrl = "https://viacep.com.br/ws/";

    public function handle(string $search): Collection
    {
        try {
           return Http::get($this->baseUrl . $search . "/json")->collect();
        } catch (Exception $e) {
            
        }
    }
}