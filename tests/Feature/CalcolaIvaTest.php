<?php

namespace Tests\Feature;

use App\Http\Controllers\Api\v1\CalcoloIva;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CalcolaIvaTest extends TestCase
{
    use RefreshDatabase;

    /** @test*/
    public function testCalcoloIva()
    {
        $numero = 100; // Numero di prova per il calcolo dell'IVA
        $response = $this->json('GET', '/api/v1/calcoloIva/' . $numero);

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'err',
                     'message'
                 ]);

        $responseData = $response->json();

        // Verifica che il campo 'data' nel JSON di risposta contenga il risultato corretto del calcolo dell'IVA
        $this->assertArrayHasKey('data', $responseData);
        $this->assertEquals($numero * 0.22, $responseData['data']); // Calcolo dell'IVA (22%)
    }

}
