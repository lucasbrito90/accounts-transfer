<?php

namespace App\Services\Validate\Transference;

use App\Models\Customer;
use App\Services\Validate\Customer\IsACustomerShopkeeper;
use App\Services\Validate\Wallet\IsBalanceEnoughValidate;
use App\Services\Validate\Wallet\IsBalancePositiveValidate;
use App\Services\Validate\Wallet\ThirdPartyValidate;

class TransferenceValidations
{
    public static function do(Customer $customer, float $amount)
    {
        $balanceEnough = new IsBalanceEnoughValidate();
        $isBalancePositive = new IsBalancePositiveValidate();
        $thirdParty = new ThirdPartyValidate();

        $balanceEnough
            ->next($isBalancePositive)
            ->next($thirdParty);

        $balanceEnough->handle($customer, $amount);


        $customerValidates = new IsACustomerShopkeeper();
        $customerValidates->handle($customer);
    }
}
