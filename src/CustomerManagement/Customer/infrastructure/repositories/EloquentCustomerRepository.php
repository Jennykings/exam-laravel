<?php

declare(strict_types=1);

namespace Src\CustomerManagement\Customer\Infrastructure\Repositories;

use App\Models\Customer as EloquentCustomerModel;
use Src\CustomerManagement\Customer\Domain\Contracts\CustomerRepositoryContract;

final class EloquentCustomerRepository implements CustomerRepositoryContract
{
	private $eloquentModel;

	public function __construct()
	{
		$this -> eloquentModel = new EloquentCustomerModel;
	}
}