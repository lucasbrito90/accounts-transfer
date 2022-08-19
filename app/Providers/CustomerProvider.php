<?php

namespace App\Providers;

use App\Repositories\Customer\Contracts\CustomerRepositoryContract;
use App\Repositories\Customer\CustomerRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class CustomerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CustomerRepositoryContract::class, CustomerRepositoryEloquent::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
