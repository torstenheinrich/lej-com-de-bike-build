<?php

namespace Lej\Com\De\BikeBuild\Renderer;

use JetBrains\PhpStorm\Pure;
use Lej\Com\De\BikeBuild\Build\LineItem;

class ItemRenderer implements Renderer
{
    public function render(array $lineItems)
    {
        echo PHP_EOL;
        echo '---- ITEMS ----------------------------------------------------------------' . PHP_EOL;
        echo sprintf(
                "%48s, %16s, %16s, %s (%s)",
                'name',
                'size',
                'color',
                'url',
                'amount'
            ) . PHP_EOL;
        foreach ($lineItems as $item) {
            echo sprintf(
                    "%48s, %16s, %16s, %s (%d)",
                    $item->part()->name(),
                    $item->part()->size() ?? '',
                    $item->part()->color() ?? '',
                    $this->renderUrl($item),
                    $item->amount(),
                ) . PHP_EOL;
        }
    }

    #[Pure] private function renderUrl(LineItem $item): string
    {
        if (!$item->vendor()->url()) {
            return 'none';
        } elseif (strlen($item->vendor()->url()) > 64) {
            return substr($item->vendor()->url(), 0, 64) . '...';
        } else {
            return $item->vendor()->url();
        }
    }
}
