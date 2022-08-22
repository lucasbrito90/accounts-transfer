<?php

namespace App\Repositories\Customer;

use App\Exceptions\EmailIsAlreadyExists;
use App\Models\Customer;
use App\Repositories\Customer\Contracts\CustomerRepositoryContract;
use Illuminate\Support\Collection;

class CustomerRepositoryEloquent implements CustomerRepositoryContract
{
    public function __construct(
        protected Customer $model
    ) {
    }


    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find($accountNumber): Customer
    {
        return $this->model->where('account_number', $accountNumber)->first();
    }

    /**
     * @throws EmailIsAlreadyExists
     */
    public function create($data): Customer
    {
        $customerByEmail = Customer::where('email', $data['email'])->first();

        if ($customerByEmail) {
            throw new EmailIsAlreadyExists();
        }

        $this->model->firstname = $data['firstname'];
        $this->model->lastname = $data['lastname'];
        $this->model->account_number = rand(11111, 99999);
        $this->model->email = $data['email'];
        $this->model->type = $data['type'];
        $this->model->document = $data['document'];
        $this->model->password = $data['password'];
        $this->model->save();

        return $this->model;
    }
}
