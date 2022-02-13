<?php

namespace Lej\Com\De\BikeBuild\Renderer;

class WeightRenderer implements Renderer
{
    public function render(array $lineItems)
    {
        echo PHP_EOL;
        echo '---- WEIGHTS ----------------------------------------------------------------' . PHP_EOL;

        $weights = ['categories' => [], 'total' => 0];
        foreach ($lineItems as $item) {
            $category = $item->part()->category()->name;

            $weight = $item->part()->weight() * $item->amount();

            if (!isset($weights['categories'][$category])) {
                $weights['categories'][$category] = 0;
            }
            $weights['categories'][$category] += $weight;
            $weights['total'] += $weight;
        }

        foreach ($weights['categories'] as $category => $weight) {
            echo sprintf('%12s: %5dg', strtolower($category), $weight) . PHP_EOL;
        }
        echo sprintf('%12s: %5dg', 'total', $weights['total']) . PHP_EOL;
        echo PHP_EOL;
    }
}
