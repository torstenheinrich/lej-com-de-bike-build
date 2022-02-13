<?php

namespace Lej\Com\De\BikeBuild\Build;

class LineItem
{
    private Part $part;
    private Vendor $vendor;
    private int $amount;

    public function __construct(Part $part, Vendor $vendor, int $amount)
    {
        $this->part = $part;
        $this->vendor = $vendor;
        $this->amount = $amount;
    }

    public function part(): Part
    {
        return $this->part;
    }

    public function vendor(): Vendor
    {
        return $this->vendor;
    }

    public function amount(): int
    {
        return $this->amount;
    }
}
