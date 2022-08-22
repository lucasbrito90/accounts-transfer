<?php

namespace App\Services\Validate;

use App\Models\Wallet;

class TransferValidates
{
    private Wallet $wallet;
    private array $errors;

    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
        $this->errors = [];
    }

    public static function build(Wallet $wallet)
    {
        return new self($wallet);
    }

    public function balanceEnough($amount, $event = false)
    {
        if ($this->wallet->balance < $amount) {
            event($event);
            $this->errors['balance'] = 'Balance is not enough';
        }
        return $this;
    }

    public function balanceIsPositive($amount, $event = false)
    {
        if ($amount <= 0) {
            event($event);
            $this->errors['amount'] = 'Amount is not positive';
        }

        return $this;
    }

    public function validate()
    {
        return $this->errors;
    }
}
