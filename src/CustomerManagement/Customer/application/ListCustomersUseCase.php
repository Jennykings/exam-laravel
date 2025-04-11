<?php

declare(strict_types=1);

namespace Src\CustomerManagement\Customer\Application;

use Src\CustomerManagement\Customer\Domain\Contracts\CustomerRepositoryContract;

final class ListCustomersUseCase
{
	private $repository;

	public function __construct(CustomerRepositoryContract $repository)
	{
		$this -> repository = $repository;
	}

	public function __invoke()
	{
		//
	}
}