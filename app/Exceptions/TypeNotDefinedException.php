<?php

namespace App\Exceptions;

use Exception;

class TypeNotDefinedException extends Exception
{
    protected $message = 'Type not defined';
    protected $code = 422;
}
