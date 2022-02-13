<?php

namespace Lej\Com\De\BikeBuild\Build;

use Money\Money;

class Vendor
{
    private ?string $url;
    private ?Money $price;
    private ?int $taxes;

    public function __construct(?string $url, ?Money $price, ?int $taxes)
    {
        $this->url = $url;
        $this->price = $price;
        $this->taxes = $taxes;
    }

    public function url(): ?string
    {
        return $this->url;
    }

    public function price(): ?Money
    {
        return $this->price;
    }

    public function taxes(): ?int
    {
        return $this->taxes;
    }
}
