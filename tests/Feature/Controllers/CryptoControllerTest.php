<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CryptoControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testBitcoinRecentPrice()
    {
        $response = $this->get('api/bitcoin');
        $response->assertStatus(200);
    }

}
