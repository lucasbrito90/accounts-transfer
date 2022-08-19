<?php

namespace App\Repositories;

use App\Events\AmountTransferredEvent;
use App\Events\NoBalanceEnoughEvent;
use App\Events\TransferenceFailedEvent;
use App\Models\Customer;
use App\Repositories\Wallet\Contracts\WalletRepositoryContract;
use App\Services\Validate\TransferValidates;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class WalletRepository implements WalletRepositoryContract
{
}
