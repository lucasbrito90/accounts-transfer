<?php

namespace App\Services\Validate\Customer;

use App\Events\ForbiddenTranferEvent;
use App\Exceptions\ForbiddenTranferException;
use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class IsACustomerShopkeeper extends CustomerValidates
{
    public function handle(Customer $customer)
    {
        if ($customer->type === 'shopkeeper') {
            $this->sendEmail($customer);
            throw new ForbiddenTranferException();
        }

        if (empty($customer->type)) {
            throw new ModelNotFoundException('Customer not found');
        }

        return true;
    }

    public function sendEmail(Customer $customer): void
    {
        if (! empty($customer->email)) {
            event(new ForbiddenTranferEvent($customer));
        }
    }
}
