<?php

namespace App\Exceptions;

use Exception;

class TransactionFailureException extends Exception
{
    protected $message = 'Transaction failed';

    protected $code = 403;
}
