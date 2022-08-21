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

    Route::group(['prefix' => 'customers'], function () {
        Route::get('/', CustomerController::class);
        Route::post('/create', CreateCustomerController::class);
    });

    Route::group(['prefix' => 'transactions'], function () {
        Route::post('/create', TransactionController::class);
    });

});


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
