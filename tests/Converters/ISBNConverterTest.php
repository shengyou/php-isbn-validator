<?php

namespace App\Tests\Converters;

use App\Converters\ISBNConverter;
use PHPUnit\Framework\TestCase;

/**
 * Class ISBNConvertersTest
 * @package App\Tests\Converters
 * @covers \App\Converters\ISBNConverter
 */
class ISBNConvertersTest extends TestCase
{
    /**
     * @test
     */
    public function shouldConvert10DigitsISBNTo13DigitsISBN()
    {
        // arrange
        $converter = new ISBNConverter();
        $isbn = "1617293296";
        $expected = "9781617293290";

        // act
        $actual = $converter->convert($isbn);

        // assert
        $this->assertEquals($expected, $actual);
    }
}
