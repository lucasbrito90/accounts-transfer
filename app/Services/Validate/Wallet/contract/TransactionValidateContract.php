<?php

namespace App\Services\Validate\Wallet\contract;

use App\Models\Customer;

interface TransactionValidateContract
{
    public function next(TransactionValidateContract $next): TransactionValidateContract;

    public function handle(Customer $customer, float $amount);
}
