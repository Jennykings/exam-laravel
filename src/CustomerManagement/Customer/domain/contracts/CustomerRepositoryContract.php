<?php

declare(strict_types=1);

namespace Src\CustomerManagement\Customer\Domain\Contracts;

use Src\CustomerManagement\Customer\Domain\Entities\Customer;

interface CustomerRepositoryContract
{
    public function create(Customer $customer): Customer;
    public function list(?string $filter, ?string $sort): array;
    public function update(int $id, Customer $customer): ?Customer;
    public function delete(int $id): bool;
}