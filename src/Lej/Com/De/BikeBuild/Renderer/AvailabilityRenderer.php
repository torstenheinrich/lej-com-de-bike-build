<?php

namespace Lej\Com\De\BikeBuild\Renderer;

use Goutte\Client;

class AvailabilityRenderer implements Renderer
{
    public function render(array $lineItems)
    {
        echo PHP_EOL;
        echo '---- AVAILABILITY ----------------------------------------------------------------' . PHP_EOL;

        $client = new Client();

        foreach ($lineItems as $item) {
            $url = $item->vendor()->url();
        }

        echo PHP_EOL;
    }
}
