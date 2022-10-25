<?php

namespace App\Searchables;

use Exception;
use Illuminate\Support\Facades\Http;
use App\Contracts\SearchableCEP;

class ViaCepApi implements SearchableCEP
{
    private string $baseUrl = "https://viacep.com.br/ws/";

    public function handle(string $search): array|string
    {
        try {
            $response = Http::get($this->baseUrl . $search . "/json")->collect();

            return [
                'city' => $response->get('localidade'),
                'public_place' => $response->get('logradouro')
            ];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
