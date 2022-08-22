<?php

namespace App\Services\Validate\Customer;

use App\Models\Customer;
use App\Services\Validate\Customer\Contract\CustomerValidateContract;

abstract class CustomerValidates implements CustomerValidateContract
{
    protected $nextHandler;

    public function next(CustomerValidateContract $next): CustomerValidateContract
    {
        $this->nextHandler = $next;
        return $next;
    }

    public function handle(Customer $customer)
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($customer);
        }

        return true;
    }
}
