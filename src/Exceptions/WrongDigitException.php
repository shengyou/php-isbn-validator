<?php

namespace App\Exceptions;

use Exception;

class WrongDigitException extends Exception
{
    protected $message = "ISBN should be 10 or 13 digits";
}