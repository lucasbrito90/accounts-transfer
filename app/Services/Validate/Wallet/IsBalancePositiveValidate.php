<?php

namespace App\Services\Validate\Wallet;

use App\Events\TransferenceFailedEvent;
use App\Models\Customer;
use Symfony\Component\HttpKernel\Exception\HttpException;

class IsBalancePositiveValidate extends WalltesTransactionsValidate
{
    public function handle(Customer $customer, float $amount)
    {

        if ($amount <= 0) {
            $this->sendEmail($customer);
            throw new HttpException(422, 'Amount is not positive');
        }
        return parent::handle($customer, $amount);

    }

    public function sendEmail(Customer $customer): void
    {
        if (!empty($customer->email)) {
            event(new TransferenceFailedEvent($customer->wallets));
        }
    }

}
