<?php

declare(strict_types=1);

namespace Src\ProductManagement\Product\Infrastructure\Repositories;

use App\Models\Product as EloquentProductModel;
use Src\ProductManagement\Product\Domain\Contracts\ProductRepositoryContract;

final class EloquentProductRepository implements ProductRepositoryContract
{
	private $eloquentModel;

	public function __construct()
	{
		$this -> eloquentModel = new EloquentProductModel;
	}
}