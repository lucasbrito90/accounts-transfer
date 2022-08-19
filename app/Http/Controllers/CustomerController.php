<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferBalanceWalletsRequest;
use App\Models\Customer;
use App\Services\WalletService;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    public function __invoke()
    {
        $all = Customer::all();
        return response()->json($all, 200);
    }
}
