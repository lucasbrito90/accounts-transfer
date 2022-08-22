<?php

namespace App\Http\Controllers;

use App\DTO\TransferValueData;
use App\Http\Requests\TransferBalanceWalletsRequest;
use App\Services\WalletService;
use Illuminate\Http\JsonResponse;

class TransactionController extends Controller
{
    public function __construct(
        protected WalletService $service
    ) {
    }

    public function __invoke(TransferBalanceWalletsRequest $request): JsonResponse
    {
        $payload = TransferValueData::fromRequest($request->validated());
        return $this->service->transference($payload->toArray());
    }
}
