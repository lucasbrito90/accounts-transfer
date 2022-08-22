<?php

namespace Tests\Unit;

use App\Exceptions\NoBalanceEnoughException;
use App\Exceptions\WalletNotAssociatedException;
use App\Models\Customer;
use App\Models\Wallet;
use App\Services\Validate\Wallet\IsBalanceEnoughValidate;
use PHPUnit\Framework\TestCase;

class TransferTest extends TestCase
{
    protected Customer $shopkeeper;
    protected Wallet $sourceWallet;

    protected function setUp(): void
    {
        $this->shopkeeper = new Customer();
        $this->shopkeeper->type = 'shopkeeper';

        $this->sourceWallet = new Wallet();
        $this->sourceWallet->balance = 100;

        $this->shopkeeper->wallets = $this->sourceWallet;
    }

    /** @test */
    public function shouldNotBeAbleToTransferWithOutAWallet()
    {
        $this->expectException(WalletNotAssociatedException::class);

        $customer = $this->createMock(Customer::class);


        $validator = new IsBalanceEnoughValidate();
        $validator->handle($customer, 50);
    }

    /** @test */
    public function shouldNotBeAbleToTranferWithLowBalance()
    {
        $this->expectException(NoBalanceEnoughException::class);


        $validator = new IsBalanceEnoughValidate();
        $validator->handle($this->shopkeeper, 50000);
    }

    /** @test */
    public function shouldBeAbleToTransfer()
    {
        $validator = new IsBalanceEnoughValidate();
        $done = $validator->handle($this->shopkeeper, 50);
        $this->assertTrue($done);
    }
}
