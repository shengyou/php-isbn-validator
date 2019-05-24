<?php

namespace App\Validators;

use App\Exceptions\WrongDigitException;

class ISBNValidator
{
    /**
     * @param string $isbn
     * @return bool
     * @throws WrongDigitException
     */
    public function validate(string $isbn): bool
    {

        $isbn = $this->removeNonNumericCharacter($isbn);

        if ($this->isWrongDigits($isbn)) {
            throw new WrongDigitException();
        }

        if (strlen($isbn) == 10) {
            return $this->validate10DigitsISBN($isbn);
        } else if (strlen($isbn) == 13) {
                return $this->validate13DigitsISBN($isbn);
        }

        return false;
    }

    /**
     * @param $isbn
     * @return string
     */
    private function removeNonNumericCharacter($isbn): string
    {
        return preg_replace("/[^0-9X]/", "", strtoupper(trim($isbn)));
    }

    /**
     * @param string $isbn
     * @return bool
     */
    private function isWrongDigits(string $isbn): bool
    {
        return strlen($isbn) != 10 && strlen($isbn) != 13;
    }

    /**
     * @param string $isbn
     * @return bool
     */
    private function validate13DigitsISBN(string $isbn): bool
    {
        $total = collect(str_split($isbn))
            ->map(function ($item, $key) {

                if ($key % 2 === 0) {
                    return $item;
                } else {
                    return $item * 3;
                }
            })
            ->sum();

        return ($total % 10 == 0);
    }

    /**
     * @param string $isbn
     * @return bool
     */
    private function validate10DigitsISBN(string $isbn): bool
    {
        $total = 0;

        foreach (str_split($isbn) as $i => $char) {
            $a = ($i == 9 && $char == 'X') ? 10 : (int)$char;
            $total += $a * (10 - $i);
        }

        return ($total % 11 == 0);
    }
}
