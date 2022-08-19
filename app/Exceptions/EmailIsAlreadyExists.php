<?php

namespace App\Exceptions;

use Exception;

class EmailIsAlreadyExists extends Exception
{
    protected $message = 'Email is already exists';
    protected $code = 400;
}
