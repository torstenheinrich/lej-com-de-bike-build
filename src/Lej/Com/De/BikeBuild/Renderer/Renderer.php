<?php

namespace Lej\Com\De\BikeBuild\Renderer;

use Lej\Com\De\BikeBuild\Build\LineItem;

interface Renderer
{
    /** @var $lineItems LineItem[] */
    public function render(array $lineItems);
}
