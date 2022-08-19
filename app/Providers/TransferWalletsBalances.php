<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Services\TransferService;

class TransferWalletsBalances extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(TransferService::class, function ($app) {
            return new TransferService();
        });
    }
}
