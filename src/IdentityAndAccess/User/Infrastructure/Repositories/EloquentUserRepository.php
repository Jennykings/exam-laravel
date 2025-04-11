<?php

declare(strict_types=1);

namespace Src\IdentityAndAccess\User\Infrastructure\Repositories;

use App\Models\User as EloquentUserModel;
use Src\IdentityAndAccess\User\Domain\Contracts\UserRepositoryContract;

final class EloquentUserRepository implements UserRepositoryContract
{
	private $eloquentModel;

	public function __construct()
	{
		$this -> eloquentModel = new EloquentUserModel;
	}
}