<?php

declare(strict_types=1);

namespace Src\CustomerManagement\Customer\Application;

use Src\CustomerManagement\Customer\Domain\Contracts\CustomerRepositoryContract;
use Src\CustomerManagement\Customer\Domain\Entities\Customer;
use Src\CustomerManagement\Customer\Domain\ValueObjects\CustomerName;
use Src\CustomerManagement\Customer\Domain\ValueObjects\CustomerEmail;

final class CreateCustomerUseCase
{
    private CustomerRepositoryContract $repository;

    public function __construct(CustomerRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $name, string $email): Customer
    {
        $customer = new Customer(new CustomerName($name), new CustomerEmail($email));
        return $this->repository->create($customer);
    }
}