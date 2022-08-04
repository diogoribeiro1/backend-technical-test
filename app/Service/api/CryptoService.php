<?php

namespace App\Service\api;

use App\Repository\api\CryptoRepository;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use ErrorException;
use Illuminate\Http\JsonResponse;

class CryptoService
{
    private Client $client;

    public function __construct(public CryptoRepository $repository)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.coingecko.com/api/v3/',
            'timeout' => 5.0,
            'verify' => false
        ]);
    }

    public function getCryptoByDate(string $coin, string $date): JsonResponse
    {
        $coin = strtolower($coin);
        $coinsValidate = array('bitcoin', 'ethereum', 'dacxi', 'cosmos', 'terra-luna');

        if (!in_array($coin, $coinsValidate)) {
            return response()
                ->json(['message' => 'Coin Not Found'], 400);
        }
        $exists = $this->repository->existsCoinByDate($date, $coin);
        if ($exists) {
            $jsonResult = $this->repository->findCoinByDate($date, $coin);
            return response()
                ->json($jsonResult, 200);
        } else {
            try {
                $jsonResult = $this->getPriceByDateAndCoin($coin, $date);
                $price = $jsonResult['market_data']['current_price']['usd'];
                $arrayResult = [
                    'coin' => $coin,
                    'price' => '$ '.$price,
                    'date' => $date
                ];
                $result = $this->repository->create($arrayResult);
            }catch (ErrorException $e) {
                return response()->json(['message' => 'Solicitação incorreta'], 400);
            }
        }
        return response()
            ->json($result, 200);
    }

    public function getCryptoNow(string $coin, string $date): JsonResponse
    {
        $coin = strtolower($coin);
        $coinsValidate = array('bitcoin', 'ethereum', 'dacxi', 'cosmos', 'terra-luna');

        if (!in_array($coin, $coinsValidate)) {
            return response()
                ->json(['message' => 'Coin Not Found'], 400);
        }
        $exists = $this->repository->existsCoinByDate($date, $coin);
        if ($exists) {
            $cryptoData = $this->repository->findCoinByDate($date, $coin);
            return response()
                ->json($cryptoData, 200);
        } else {
            $price = $this->getTheMostRecentPriceByCoin($coin);
            $arrayResult = [
                'coin' => $coin,
                'price' => '$ '.$price[$coin]['usd'],
                'date' => Carbon::now()->format('d-M-y')
            ];
            $result = $this->repository->create($arrayResult);
        }
        return response()
            ->json($result, 200);
    }

    public function getTheMostRecentPriceByCoin(string $coin)
    {
        $uri = sprintf('simple/price?ids=%s&vs_currencies=usd', $coin);
        $response = $this->client->get($uri);
        return json_decode($response->getBody(), true);
    }

    public function getPriceByDateAndCoin(string $date, string $coin)
    {
        $uri = sprintf('coins/%s/history?date=%s', $date, $coin);
        try {
            $response = $this->client->get($uri);
        }catch (ClientException $e){
            return ['message' => 'client error'];
        }
        return json_decode($response->getBody(), true);
    }

}
