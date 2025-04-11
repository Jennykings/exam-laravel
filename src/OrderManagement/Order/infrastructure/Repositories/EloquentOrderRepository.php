<?php

declare(strict_types=1);

namespace Src\OrderManagement\Order\Infrastructure\Repositories;

use App\Models\Order as EloquentOrderModel;
use Src\OrderManagement\Order\Domain\Contracts\OrderRepositoryContract;

final class EloquentOrderRepository implements OrderRepositoryContract
{
	private $eloquentModel;

	public function __construct()
	{
		$this -> eloquentModel = new EloquentOrderModel;
	}
}