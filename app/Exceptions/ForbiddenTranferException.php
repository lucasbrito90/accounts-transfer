<?php

namespace App\Exceptions;

use Exception;

class ForbiddenTranferException extends Exception
{
    protected $message = 'You are not allowed to transfer money';

    protected $code = 403;
}
