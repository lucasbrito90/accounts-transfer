<?php

namespace App\Services\Validate\Customer\Contract;

use App\Models\Customer;

interface CustomerValidateContract
{
    public function next(CustomerValidateContract $next): CustomerValidateContract;
    public function handle(Customer $customer);
}
