<?php

function GetBTCExchangeRate($currency)
{
    $blockchainAPIUrl = "https://blockchain.info/ticker";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $blockchainAPIUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
    $result = curl_exec($ch);
    $result = json_decode($result);
    curl_close($ch);

    return $result->$currency->last;
}
/**
 * Example BTC block chain APIResponse
 *  "USD" : {"15m" : 60741.29, "last" : 60741.29, "buy" : 60741.29, "sell" : 60741.29, "symbol" : "$"},
 *  "AUD" : {"15m" : 78457.89, "last" : 78457.89, "buy" : 78457.89, "sell" : 78457.89, "symbol" : "$"},
 *  "BRL" : {"15m" : 341159.55, "last" : 341159.55, "buy" : 341159.55, "sell" : 341159.55, "symbol" : "R$"},
 *  "CAD" : {"15m" : 76016.21, "last" : 76016.21, "buy" : 76016.21, "sell" : 76016.21, "symbol" : "$"},
 *  "CHF" : {"15m" : 55873.61, "last" : 55873.61, "buy" : 55873.61, "sell" : 55873.61, "symbol" : "CHF"},
 *  "CLP" : {"15m" : 4.242777859E7, "last" : 4.242777859E7, "buy" : 4.242777859E7, "sell" : 4.242777859E7, "symbol" : "$"},
 *  "CNY" : {"15m" : 396185.09, "last" : 396185.09, "buy" : 396185.09, "sell" : 396185.09, "symbol" : "¥"},
 *  "DKK" : {"15m" : 377148.46, "last" : 377148.46, "buy" : 377148.46, "sell" : 377148.46, "symbol" : "kr"},
 *  "EUR" : {"15m" : 50795.67, "last" : 50795.67, "buy" : 50795.67, "sell" : 50795.67, "symbol" : "€"},
 *  "GBP" : {"15m" : 44153.39, "last" : 44153.39, "buy" : 44153.39, "sell" : 44153.39, "symbol" : "£"},
 *  "HKD" : {"15m" : 471893.34, "last" : 471893.34, "buy" : 471893.34, "sell" : 471893.34, "symbol" : "$"},
 *  "INR" : {"15m" : 4519335.04, "last" : 4519335.04, "buy" : 4519335.04, "sell" : 4519335.04, "symbol" : "₹"},
 *  "ISK" : {"15m" : 7693492.29, "last" : 7693492.29, "buy" : 7693492.29, "sell" : 7693492.29, "symbol" : "kr"},
 *  "JPY" : {"15m" : 6628360.78, "last" : 6628360.78, "buy" : 6628360.78, "sell" : 6628360.78, "symbol" : "¥"},
 *  "KRW" : {"15m" : 6.767427307E7, "last" : 6.767427307E7, "buy" : 6.767427307E7, "sell" : 6.767427307E7, "symbol" : "₩"},
 *  "NZD" : {"15m" : 84820.6, "last" : 84820.6, "buy" : 84820.6, "sell" : 84820.6, "symbol" : "$"},
 *  "PLN" : {"15m" : 230460.97, "last" : 230460.97, "buy" : 230460.97, "sell" : 230460.97, "symbol" : "zł"},
 *  "RUB" : {"15m" : 4593438.87, "last" : 4593438.87, "buy" : 4593438.87, "sell" : 4593438.87, "symbol" : "RUB"},
 *  "SEK" : {"15m" : 512346.92, "last" : 512346.92, "buy" : 512346.92, "sell" : 512346.92, "symbol" : "kr"},
 *  "SGD" : {"15m" : 81008.23, "last" : 81008.23, "buy" : 81008.23, "sell" : 81008.23, "symbol" : "$"},
 *  "THB" : {"15m" : 1899805.45, "last" : 1899805.45, "buy" : 1899805.45, "sell" : 1899805.45, "symbol" : "฿"},
 *  "TRY" : {"15m" : 490085.06, "last" : 490085.06, "buy" : 490085.06, "sell" : 490085.06, "symbol" : "₺"},
 *  "TWD" : {"15m" : 1721134.94, "last" : 1721134.94, "buy" : 1721134.94, "sell" : 1721134.94, "symbol" : "NT$"}
 */

function GetETHExchangeRate($currency)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=' . $currency,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);
    $response = json_decode($response);
    curl_close($curl);
    return $response->$currency;
}



/**
 * Example Response from min-API
 * {"USD":2403.43}
 */
