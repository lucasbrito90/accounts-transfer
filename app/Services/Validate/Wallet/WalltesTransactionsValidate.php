<?php

namespace App\Services\Validate\Wallet;

use App\Models\Customer;
use App\Services\Validate\Wallet\contract\TransactionValidateContract;

abstract class WalltesTransactionsValidate implements TransactionValidateContract
{
    protected $nextHandler;

    public function next(TransactionValidateContract $next): TransactionValidateContract
    {
        $this->nextHandler = $next;
        return $next;
    }

    public function handle(Customer $customer, float $amount)
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($customer, $amount);
        }
        return true;
    }
}
