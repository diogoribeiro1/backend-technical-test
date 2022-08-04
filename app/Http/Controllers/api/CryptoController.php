<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Service\api\CryptoService;
use Carbon\Carbon;

class CryptoController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/{coin}",
     *      operationId="getRecentPrice",
     *      tags={"Projects"},
     *      summary="Get price(in dollar) by Cryptocurrency name",
     *      description="Returns a price(in dollar)",
     *     @OA\Parameter(
     *          name="coin",
     *          description="The name of the cryptocurrency eg. bitcoin, ethereum, dacxi, cosmos and terra-luna ",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      )
     * )
     */
    public function getRecentPrice(CryptoService $service, string $coin)
    {
        $date = Carbon::now()->isoFormat('DD-MM-YYYY');
        $jsonResult = $service->getCryptoNow($coin, $date);
        return $jsonResult;
    }

    /**
     * @OA\Get(
     *      path="/api/{coin}/search/{date}",
     *      operationId="getPriceByDate",
     *      tags={"Projects"},
     *      summary="Get price(in dollar) by date and Cryptocurrency name",
     *      description="Returns a price(in dollar)",
     *      @OA\Parameter(
     *          name="date",
     *          description="The date of data snapshot in dd-mm-yyyy eg. 30-12-2017",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="coin",
     *          description="The name of the cryptocurrency eg. bitcoin, ethereum, dacxi, cosmos and terra-luna",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      )
     * )
     */
    public function getPriceByDate(CryptoService $criptoService, string $coin, string $date)
    {
        $jsonResult = $criptoService->getCryptoByDate($coin, $date);
        return $jsonResult;
    }

}
