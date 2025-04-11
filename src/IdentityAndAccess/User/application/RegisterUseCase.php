<?php

declare(strict_types=1);

namespace Src\IdentityAndAccess\User\Application;

use Src\IdentityAndAccess\User\Domain\Contracts\UserRepositoryContract;

final class RegisterUseCase
{
	private $repository;

	public function __construct(UserRepositoryContract $repository)
	{
		$this -> repository = $repository;
	}

	public function __invoke()
	{
		//
	}
}