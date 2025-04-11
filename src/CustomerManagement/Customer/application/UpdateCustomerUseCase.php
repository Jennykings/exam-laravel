<?php

declare(strict_types=1);

namespace Src\CustomerManagement\Customer\Application;

use Src\CustomerManagement\Customer\Domain\Contracts\CustomerRepositoryContract;
use Src\CustomerManagement\Customer\Domain\Entities\Customer;
use Src\CustomerManagement\Customer\Domain\ValueObjects\CustomerEmail;
use Src\CustomerManagement\Customer\Domain\ValueObjects\CustomerName;

final class UpdateCustomerUseCase
{
    private CustomerRepositoryContract $repository;

    public function __construct(CustomerRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $id, string $name, string $email): ?Customer
    {
        $customer = new Customer(new CustomerName($name), new CustomerEmail($email), $id);
        return $this->repository->update($id, $customer);
    }
}