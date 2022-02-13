<?php

namespace Lej\Com\De\BikeBuild\Renderer;

class VarDumpRenderer implements Renderer
{
    public function render(array $lineItems)
    {
        var_dump($lineItems);
    }
}
