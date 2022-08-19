<?php

namespace App\Exceptions;

use Exception;

class WalletNotAssociatedException extends Exception
{
    protected $message = 'Wallet not associated';
    protected $code = 422;
}
