<?php

namespace App\Services;

use App\Models\Customer;
use App\Repositories\Customer\Contracts\CustomerRepositoryContract;

class CustomerService
{
    public function __construct(
        public CustomerRepositoryContract $customer
    )
    {
    }

    public function create(array $payload): Customer
    {
        $customer = $this->customer->create($payload);
        $customer->wallets()->create(['balance' => 0]);
        $customer->save();

        return $customer;
    }
}
