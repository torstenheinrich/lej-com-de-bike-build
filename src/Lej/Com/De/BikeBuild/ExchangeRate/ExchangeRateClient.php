<?php

namespace Lej\Com\De\BikeBuild\ExchangeRate;

use Money\Currency;

interface ExchangeRateClient
{
    public function fetchExchangeRate(Currency $from, Currency $to): float;
}
