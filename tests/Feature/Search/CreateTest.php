<?php

namespace Tests\Feature\Search;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CreateTest extends TestCase
{
    public function test_user_can_make_a_search()
    {
        /** @var User $user */
        $user = User::factory()->create();

        Http::fake([
            "https://viacep.com.br/ws/*" => Http::response([
               'cep' => '39640-000',
               'logradouro' => '',
               'localidade' => 'Berilo',
            ], 200)
        ]);
        Http::fake([
            'https://api.hgbrasil.com/*' =>Http::response([
                'results' => [
                    'description' => 'Tempo Nublado',
                    'temp' => 30,
                    'humidity' => 80,
                    'wind_speedy' => "20 km/h",
                ]
            ])
        ]);
        
        $response = $this->actingAs($user)->postJson(route('searches.store'), [
            'search' => '39640000'
        ]);
      
        $response->assertCreated();

        $this->assertDatabaseHas('searches',['CEP' => '39640000', 'city' => 'Berilo']);
    }
}
