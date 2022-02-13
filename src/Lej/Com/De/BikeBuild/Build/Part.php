<?php

namespace Lej\Com\De\BikeBuild\Build;

class Part
{
    private string $name;
    private Category $category;
    private ?string $size;
    private ?string $color;
    private ?int $weight;

    public function __construct(string $name, Category $category, ?string $size, ?string $color, ?int $weight)
    {
        $this->name = $name;
        $this->category = $category;
        $this->size = $size;
        $this->color = $color;
        $this->weight = $weight;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function category(): Category
    {
        return $this->category;
    }

    public function size(): ?string
    {
        return $this->size;
    }

    public function color(): ?string
    {
        return $this->color;
    }

    public function weight(): ?int
    {
        return $this->weight;
    }
}
