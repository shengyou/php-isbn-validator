<?php

namespace App\Tests\Validators;

use App\Exceptions\WrongDigitException;
use App\Validators\ISBNValidator;
use PHPUnit\Framework\TestCase;

/**
 * Class ISBNValidatorTest
 * @package App\Tests\Validators
 * @covers \App\Validators\ISBNValidator
 */
class ISBNValidatorTest extends TestCase
{
    /**
     * @test
     * @throws WrongDigitException
     */
    public function shouldPassWhenEnterAValid13DigitISBN()
    {
        // arrange
        $validator = new ISBNValidator();
        $isbn = "9781617293290";

        // act
        $actual = $validator->validate($isbn);

        // assert
        $this->assertTrue($actual);
    }

    /**
     * @test
     * @throws WrongDigitException
     */
    public function shouldFailedWhenEnterAnInvalid13DigitsISBN()
    {
        // arrange
        $validator = new ISBNValidator();
        $isbn = "9781617293291";

        // act
        $actual = $validator->validate($isbn);

        // assert
        $this->assertFalse($actual);
    }

    /**
     * @test
     * @throws WrongDigitException
     */
    public function shouldPassIfISBNHasDashCharacter()
    {
        // arrange
        $validator = new ISBNValidator();
        $isbn = "978-1617293290";

        // act
        $actual = $validator->validate($isbn);

        // assert
        $this->assertTrue($actual);
    }

    /**
     * @test
     * @throws WrongDigitException
     */
    public function shouldPassIfISBNHasSpace()
    {
        // arrange
        $validator = new ISBNValidator();
        $isbn = " 978-1 6172932 90 ";

        // act
        $actual = $validator->validate($isbn);

        // assert
        $this->assertTrue($actual);
    }

    /**
     * @test
     * @throws WrongDigitException
     */
    public function shouldThrowExceptionWhenISBNIsNot13Digit()
    {
        // arrange
        $validator = new ISBNValidator();
        $isbn = "978161729329";

        // assume
        $this->expectException(WrongDigitException::class);

        // act
        $validator->validate($isbn);
    }

    /**
     * @test
     * @throws WrongDigitException
     */
    public function shouldPassWhenEnterAValidate10DigitsISBN()
    {
        // arrange
        $validator = new ISBNValidator();
        $isbn = "1617293296";

        // act
        $actual = $validator->validate($isbn);

        // assert
        $this->assertTrue($actual);
    }

    /**
     * @test
     * @throws WrongDigitException
     */
    public function shouldFailedWhenEnterAnInvalidate10DigitsISBN()
    {
        // arrange
        $validator = new ISBNValidator();
        $isbn = "1617293297";

        // act
        $actual = $validator->validate($isbn);

        // assert
        $this->assertFalse($actual);
    }

    /**
     * @test
     * @throws WrongDigitException
     */
    public function shouldPassWhenEnterAValid10DigitsISBNThatEndWithX()
    {
        // arrange
        $validator = new ISBNValidator();
        $isbn = "012000030X";

        // act
        $actual = $validator->validate($isbn);

        // assert
        $this->assertTrue($actual);
    }

    /**
     * @test
     * @throws WrongDigitException
     */
    public function shouldFailWhenEnterAnInvalid10DigitsISBNThatEndWithX()
    {
        // arrange
        $validator = new ISBNValidator();
        $isbn = "012000031X";

        // act
        $actual = $validator->validate($isbn);

        // assert
        $this->assertFalse($actual);
    }
}
