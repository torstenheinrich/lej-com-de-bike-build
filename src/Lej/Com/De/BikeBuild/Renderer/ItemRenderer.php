<?php

namespace Lej\Com\De\BikeBuild\Renderer;

class ItemRenderer implements Renderer
{
    public function render(array $lineItems)
    {
        echo PHP_EOL;
        echo '---- ITEMS ----------------------------------------------------------------' . PHP_EOL;
        foreach ($lineItems as $item) {
            echo sprintf(
                    "%42s, %8s, %14s : %s (%d)",
                    $item->part()->name(),
                    $item->part()->size() ?? '-',
                    $item->part()->color() ?? '-',
                    $item->vendor()->url() ?? '-',
                    $item->amount(),
                ) . PHP_EOL;
        }
    }
}
