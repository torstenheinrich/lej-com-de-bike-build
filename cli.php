<?php

require_once './vendor/autoload.php';

use Lej\Com\De\BikeBuild\ExchangeRate\FixerIoExchangeRateClient;
use Lej\Com\De\BikeBuild\Parser\Parser;
use Lej\Com\De\BikeBuild\Renderer\AvailabilityRenderer;
use Lej\Com\De\BikeBuild\Renderer\ItemRenderer;
use Lej\Com\De\BikeBuild\Renderer\PriceRenderer;
use Lej\Com\De\BikeBuild\Renderer\WeightRenderer;
use Money\Currency;

$exchangeRateClient = new FixerIoExchangeRateClient('b9d48eb2bc05a795346ee317a452add7');

$parser = new Parser();
$lineItems = $parser->parseFile($argv[1]);

$exchangeRates = [
    'EUR' => ['GBP' => 0.84]
];

$renderer = new PriceRenderer($exchangeRates, new Currency('EUR'));
$renderer->render($lineItems);

$renderer = new WeightRenderer();
$renderer->render($lineItems);

$renderer = new ItemRenderer();
$renderer->render($lineItems);

$renderer = new AvailabilityRenderer();
$renderer->render($lineItems);
