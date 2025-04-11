<?php

declare(strict_types=1);

namespace Src\CustomerManagement\Customer\Application;

use Src\CustomerManagement\Customer\Domain\Contracts\CustomerRepositoryContract;

final class ListCustomersUseCase
{
    private CustomerRepositoryContract $repository;

    public function __construct(CustomerRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(?string $filter = null, ?string $sort = 'desc'): array
    {
        return $this->repository->list($filter, $sort);
    }
}