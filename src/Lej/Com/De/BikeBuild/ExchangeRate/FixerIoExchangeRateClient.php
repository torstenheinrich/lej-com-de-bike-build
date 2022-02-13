<?php

namespace Lej\Com\De\BikeBuild\ExchangeRate;

use Money\Currency;

class FixerIoExchangeRateClient implements ExchangeRateClient
{
    private string $accessKey;

    public function __construct(string $accessKey)
    {
        $this->accessKey = $accessKey;
    }

    public function fetchExchangeRate(Currency $from, Currency $to): float
    {
        $url = sprintf(
            'http://data.fixer.io/api/latest?access_key=%s&base=%s&symbols=%s',
            $this->accessKey,
            $to->getCode(),
            $from->getCode(),
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $currencies = json_decode(curl_exec($curl), true);
        curl_close($curl);

        return $currencies['rates'][$from->getCode()];
    }
}
