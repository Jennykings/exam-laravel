<?php

declare(strict_types=1);

namespace Src\CustomerManagement\Customer\Infrastructure\Repositories;

use App\Models\Customer as EloquentCustomer;
use Src\CustomerManagement\Customer\Domain\Contracts\CustomerRepositoryContract;
use Src\CustomerManagement\Customer\Domain\Entities\Customer;

final class EloquentCustomerRepository implements CustomerRepositoryContract
{
    public function create(Customer $customer): Customer
    {
        $data = EloquentCustomer::create([
            'name' => $customer->getName()->value(),
            'email' => $customer->getEmail()->value(),
        ]);

        return new Customer($customer->getName(), $customer->getEmail(), $data->id);
    }

    public function list(?string $filter = null, ?string $sort = 'desc'): array
    {
        $query = EloquentCustomer::query();

        if ($filter) {
            $query->where('name', 'like', '%' . $filter . '%');
        }

        $query->orderBy('created_at', $sort);

        return $query->get()->toArray();
    }

    public function update(int $id, Customer $customer): ?Customer
    {
        $model = EloquentCustomer::find($id);

        if (!$model) {
            return null;
        }

        $model->update([
            'name' => $customer->getName()->value(),
            'email' => $customer->getEmail()->value(),
        ]);

        return new Customer($customer->getName(), $customer->getEmail(), $model->id);
    }

    public function delete(int $id): bool
    {
        $model = EloquentCustomer::find($id);
        return $model ? $model->delete() : false;
    }
}