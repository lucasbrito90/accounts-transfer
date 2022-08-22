<?php

namespace App\Http\Controllers;

use App\DTO\CustomerValueData;
use App\Http\Requests\CreateCustomerRequest;
use App\Services\CustomerService;

class CreateCustomerController extends Controller
{
    public function __construct(
        private CustomerService $service
    ) {
    }

    public function __invoke(CreateCustomerRequest $request)
    {
        $payload = CustomerValueData::fromRequest($request->validated());
        return $this->service->create($payload->toArray());
    }
}
