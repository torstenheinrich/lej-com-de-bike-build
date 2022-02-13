<?php

namespace Lej\Com\De\BikeBuild\Renderer;

use Money\Currency;

class PriceRenderer implements Renderer
{
    private array $exchangeRates;
    private Currency $currency;

    public function __construct(array $exchangeRates, Currency $currency)
    {
        $this->exchangeRates = $exchangeRates;
        $this->currency = $currency;
    }

    public function render(array $lineItems)
    {
        echo PHP_EOL;
        echo '---- PRICES ----------------------------------------------------------------' . PHP_EOL;

        $prices = ['categories' => [], 'total' => 0];
        foreach ($lineItems as $item) {
            $category = $item->part()->category()->name;

            $price = $item->vendor()->price();
            if (!$price) continue;

            $exchangeRate = 1.0;
            if ($price->getCurrency()->getCode() !== $this->currency->getCode()) {
                $exchangeRate = 1 / $this->exchangeRates[$this->currency->getCode()][$price->getCurrency()->getCode()];
            }
            $taxRate = 1.0;
            if ($item->vendor()->taxes() > 0) {
                $taxRate += $item->vendor()->taxes() / 100;
            }
            $price = $price->getAmount() * $exchangeRate * $taxRate * $item->amount() / 100;

            if (!isset($prices['categories'][$category])) {
                $prices['categories'][$category] = 0.0;
            }
            $prices['categories'][$category] += $price;
            $prices['total'] += $price;
        }

        foreach ($prices['categories'] as $category => $price) {
            echo sprintf('%12s: %7.2f€', strtolower($category), $price) . PHP_EOL;
        }
        echo sprintf('%12s: %7.2f€', 'total', $prices['total']) . PHP_EOL;
        echo PHP_EOL;
    }
}
