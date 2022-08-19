<?php

namespace Database\Seeders;


use App\Models\Customer;
use App\Models\Wallet;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(20)->create()->each(function ($customer) {
            $customer->wallets()->saveMany(Wallet::factory(1)->make());
        });
    }
}
