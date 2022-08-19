<?php

namespace App\Exceptions;

use Exception;

class NoBalanceEnoughException extends Exception
{
    protected $message = 'You have not enough balance';

    protected $code = 403;
}
