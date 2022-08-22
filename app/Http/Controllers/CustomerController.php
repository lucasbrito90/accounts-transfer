<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function __invoke()
    {
        $all = Customer::all();
        return response()->json($all, 200);
    }
}
