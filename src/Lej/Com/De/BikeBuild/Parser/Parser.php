<?php

namespace Lej\Com\De\BikeBuild\Parser;

use Lej\Com\De\BikeBuild\Build\Category;
use Lej\Com\De\BikeBuild\Build\LineItem;
use Lej\Com\De\BikeBuild\Build\Part;
use Lej\Com\De\BikeBuild\Build\Vendor;
use Money\Currency;
use Money\Money;

class Parser
{
    public function parseFile(string $fileName): array
    {
        $file = new \SplFileObject($fileName);

        $results = [];
        while (!$file->eof()) {
            $line = trim(str_replace(["\r", "\n"], '', $file->fgets()));
            if (!strlen($line)) continue;
            $results[] = $this->parseLine($line);
        }

        return $results;
    }

    private function parseLine(string $line): LineItem
    {
        $parts = array_map(function ($e) {
            return trim($e);
        }, explode(',', $line));

        $attributes = [];
        foreach ($parts as $part) {
            $colon = strpos($part, ':');
            $attributes[substr($part, 0, $colon)] = trim(substr($part, $colon + 1));
        }

        $part = new Part(
            $attributes['n'],
            Category::from($attributes['c']),
            $attributes['s'] ?? null,
            $attributes['co'] ?? null,
            $attributes['w'] ?? null,
        );

        $price = null;
        if (isset($attributes['p'])) {
            $price = new Money($attributes['p'] * 100, new Currency($attributes['cu'] ?? 'EUR'));
        }

        $vendor = new Vendor(
            $attributes['u'] ?? null,
            $price,
            $attributes['t'] ?? null
        );

        return new LineItem($part, $vendor, $attributes['a'] ?? 1);
    }
}
