<?php

namespace Tests\Unit;

use App\Models\Customer;
use App\Services\Validate\Wallet\IsBalancePositiveValidate;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Exception\HttpException;

class TransferNegativeBalanceTest extends TestCase
{
    /** @test */
    public function shouldThrowsAnExceptionIfTheAmountIsNegative()
    {
        $this->expectException(HttpException::class);

        $customer = $this->createMock(Customer::class);

        $validator = new IsBalancePositiveValidate();
        $validator->handle($customer, -1);

        $this->expectException(HttpException::class);
        $this->expectExceptionMessage('Amount is not positive');
        $this->expectExceptionCode(422);
    }

    /** @test */
    public function shouldThrowsAnExceptionIfTheAmountIsZero()
    {
        $this->expectException(HttpException::class);

        $customer = $this->createMock(Customer::class);

        $validator = new IsBalancePositiveValidate();
        $validator->handle($customer, 0);
    }

    /** @test */
    public function shouldReceiveTrueIfAmountIsPositive()
    {
        $customer = $this->createMock(Customer::class);

        $validator = new IsBalancePositiveValidate();
        $done = $validator->handle($customer, 1);
        $this->assertTrue($done);
    }
}
