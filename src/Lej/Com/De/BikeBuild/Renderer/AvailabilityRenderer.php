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
            if ($url) {
                $crawler = $client->request('GET', $url);
                $crawler->filter('p.price__value')->each(function ($node) {
                    echo $node->text() . PHP_EOL;
                });
            }
        }

        echo PHP_EOL;
    }
}
