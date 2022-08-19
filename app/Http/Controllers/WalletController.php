<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferBalanceWalletsRequest;
use App\Models\Wallet;
use App\Services\WalletService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function __construct(
        protected WalletService $service
    ) {
    }

    public function transfer(TransferBalanceWalletsRequest $request): JsonResponse
    {
        $input = $request->only(['source', 'amount', 'target']);
        $value = $input['amount'];
        $source = $input['source'];
        $target = $input['target'];
        return $this->service->transference($source, $target, $value);
    }

}
