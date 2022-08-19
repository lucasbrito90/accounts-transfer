<?php

namespace App\Services\Validate\Wallet;

use App\Models\Customer;
use GuzzleHttp\Client;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ThirdPartyValidate extends WalltesTransactionsValidate
{
    public function handle(Customer $customer, float $amount)
    {
        $client = new Client();
        $response = $client->request('GET',  config('services.validator.address'));
        $body = json_decode($response->getBody()->getContents());

        if ($response->getStatusCode() === 200 && $body->message === 'Autorizado' ) {
            return parent::handle($customer, $amount);
        }

        throw new HttpException(500, 'Third party service unavailable');
    }
}
