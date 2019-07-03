<?php

require __DIR__ . '/vendor/autoload.php';

use App\Validators\ISBNValidator;

$validator = new ISBNValidator();
$isbn = ($_GET['isbn'] ?? '9781617293290');


if ($validator->validate($isbn)) {
    echo 'Pass!';
} else {
    echo 'Not Validate';
}
