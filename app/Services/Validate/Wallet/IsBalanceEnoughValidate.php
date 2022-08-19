<?php

namespace App\Services\Validate\Wallet;

use App\Events\NoBalanceEnoughEvent;
use App\Exceptions\NoBalanceEnoughException;
use App\Exceptions\WalletNotAssociatedException;
use App\Models\Customer;

class IsBalanceEnoughValidate extends WalltesTransactionsValidate
{
    public function handle(Customer $customer, float $amount)
    {
        if (empty($customer->wallets)) {
            throw new WalletNotAssociatedException();
        }

        if (!empty($customer->email)) {
            event(new NoBalanceEnoughEvent($customer->wallets));
        }

        if ($customer->wallets->balance < $amount) {
            throw new NoBalanceEnoughException();
        }

        return parent::handle($customer, $amount);
    }
}
