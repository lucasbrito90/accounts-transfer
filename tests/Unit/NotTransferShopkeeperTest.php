<?php

namespace Tests\Unit;

use App\Exceptions\ForbiddenTranferException;
use App\Models\Customer;
use App\Services\Validate\Customer\IsACustomerShopkeeper;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PHPUnit\Framework\TestCase;

class NotTransferShopkeeperTest extends TestCase
{
    protected Customer $shopkeeper;

    protected function setUp(): void
    {
        $this->shopkeeper = new Customer();
        $this->shopkeeper->type = 'shopkeeper';
    }

    /**
     * @test
     */
    public function shouldThrowAExceptionWhenIsAShopkeeper()
    {
        $this->expectException(ForbiddenTranferException::class);

        $validator = $this->createMock(IsACustomerShopkeeper::class);
        $validator
            ->method('handle')
            ->will($this->throwException(new ForbiddenTranferException()));

        $validator->handle($this->shopkeeper);
    }

    /**
     * @test
     */
    public function shouldThrowAExceptionWhenIsABlankCustomer()
    {
        $this->expectException(ModelNotFoundException::class);

        $customerMock = $this->createMock(Customer::class);

        $validator = $this->createMock(IsACustomerShopkeeper::class);
        $validator
            ->method('handle')
            ->will($this->throwException(new ModelNotFoundException()));

        $validator->handle($customerMock);
    }
}
