<?php

namespace App\Converters;

class ISBNConverter
{
    public function convert(string $isbn): string
    {
        $isbn = "978".substr($isbn, 0, strlen($isbn) - 1);
        $total = 0;

        foreach (str_split($isbn) as $i => $char) {
            $a = (int)$char;
            $b = ($i % 2 == 0) ? 1 : 3;

            $total += $a * $b;
        }

        if ($total % 10 == 0) {
            $lastChar = "0";
        } else {
            $lastChar = (10 - ($total % 10));
        }

        return $isbn.$lastChar;
    }
}
