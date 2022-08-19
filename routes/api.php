<?php

use App\Http\Controllers\CreateCustomerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['defaultJsonResponse'])->group(function () {
    Route::get('/', CustomerController::class);
    Route::post('/create-customer', CreateCustomerController::class);
    Route::post('/transfer-value', TransactionController::class);
});


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
