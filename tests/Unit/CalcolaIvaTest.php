<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\v1\CalcoloIva;
use PHPUnit\Framework\TestCase;

class CalcolaIvaTest extends TestCase
{
    /** */
    public function testCalcolaIva()
    {
        // Preparazione
        $numero = 100;

        // Esecuzione
        $result = CalcoloIva::calcolaIva($numero);

        // Verifica
        $this->assertArrayHasKey('data', $result);
        $this->assertArrayHasKey('err', $result);
        $this->assertArrayHasKey('message', $result);
        $this->assertNull($result['err']);
        $this->assertNull($result['message']);

        // Calcolo dell'IVA atteso (22% di $numero)
        $expectedIva = $numero * 0.22;

        // Verifica che il risultato sia vicino al valore atteso
        $this->assertEquals($expectedIva, $result['data'], '', 0.01);
    }
}
