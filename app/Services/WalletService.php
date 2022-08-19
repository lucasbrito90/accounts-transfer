<?php

namespace App\Services;

use App\Events\AmountTransferredEvent;
use App\Events\TransferenceFailedEvent;
use App\Exceptions\TransactionFailureException;
use App\Models\Customer;
use App\Repositories\Customer\Contracts\CustomerRepositoryContract;
use App\Services\Validate\Customer\IsACustomerShopkeeper;
use App\Services\Validate\Transference\TransferenceValidations;
use App\Services\Validate\Wallet\IsBalanceEnoughValidate;
use App\Services\Validate\Wallet\IsBalancePositiveValidate;
use App\Services\Validate\Wallet\ThirdPartyValidate;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\HttpException;

class WalletService
{
    public function __construct(
        public CustomerRepositoryContract $customer,
    )
    {
    }

    public function transference($payload): JsonResponse
    {
        $source = $this->customer->find($payload['source']);
        $target = $this->customer->find($payload['target']);

        TransferenceValidations::do($source, $payload['amount']);

        return $this->transaction($source, $payload['amount'],  $target);
    }

    private function transaction(Customer $source, $value, Customer $target): JsonResponse
    {
        try {
            DB::transaction(function () use ($source, $value, $target) {
                $sourceWallet = $source->wallets;

                $sourceWallet->balance -= $value;
                $sourceWallet->transactions()->create([
                    'type' => 'debit',
                    'amount' => $value,
                    'who_id' => $target->wallets->id,
                ]);

                $sourceWallet->save();


                $targetWallet = $target->wallets;

                $targetWallet->balance += $value;
                $targetWallet->transactions()->create([
                    'type' => 'credit',
                    'amount' => $value,
                    'who_id' => $source->wallets->id,
                ]);

                $targetWallet->save();
            });
        } catch (\Exception $exception) {
            TransferenceFailedEvent::dispatch($source);
            throw new TransactionFailureException();
        }


        AmountTransferredEvent::dispatch($source, $target);
        return response()->json(['message' => 'Transaction success'], 200);
    }
}
