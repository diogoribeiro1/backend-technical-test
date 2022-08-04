<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CryptoControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetARecentPriceByBitcoin()
    {
        $response = $this->get('/api/bitcoin');
        $response->assertStatus(200);
        $response->assertJson(['coin' => 'bitcoin']);
    }

    public function testGetARecentPriceByEthereum()
    {
        $response = $this->get('/api/Ethereum');
        $response->assertStatus(200);
        $response->assertJson(['coin' => 'ethereum']);
    }

    public function testGetARecentPriceByDacxi()
    {
        $response = $this->get('/api/Dacxi');
        $response->assertStatus(200);
        $response->assertJson(['coin' => 'dacxi']);
    }

    public function testGetARecentPriceByCosmos()
    {
        $response = $this->get('/api/Cosmos');
        $response->assertStatus(200);
        $response->assertJson(['coin' => 'cosmos']);
    }

    public function testGetARecentPriceByWrongCryptocurrency()
    {
        $response = $this->get('/api/wrongName');
        $response->assertStatus(400);
        $response->assertJson(['message' => 'Coin Not Found']);
    }

    public function testGetAPriceByDate()
    {
        $response = $this->get('/api/bitcoin/search/11-02-2020');
        $response->assertStatus(200);
        $response->assertJson(['coin' => 'bitcoin']);
    }

    public function testGetAPriceByWrongDate()
    {
        $response = $this->get('/api/bitcoin/search/11-02-1900');
        $response->assertStatus(400);
        $response->assertJson(['message' => 'Solicitação incorreta']);
    }

    public function testGetAPriceByDateAndWrongCryptocurrency()
    {
        $response = $this->get('/api/wrongName/search/11-02-2020');
        $response->assertStatus(400);
        $response->assertJson(['message' => 'Coin Not Found']);
    }

}
