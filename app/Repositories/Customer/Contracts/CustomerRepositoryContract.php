<?php

namespace App\Repositories\Customer\Contracts;

use App\Models\Customer;
use Illuminate\Support\Collection;

interface CustomerRepositoryContract
{
    public function all(): Collection;

    public function find($accountNumber): Customer;

    public function create(array $data): Customer;
}
