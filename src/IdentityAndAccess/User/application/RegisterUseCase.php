<?php

declare(strict_types=1);

namespace Src\IdentityAndAccess\User\Application;

use Src\IdentityAndAccess\User\Domain\Entities\User as DomainUser;
use Src\IdentityAndAccess\User\Domain\ValueObjects\Name;
use Src\IdentityAndAccess\User\Domain\ValueObjects\Email;
use Src\IdentityAndAccess\User\Domain\ValueObjects\Password;
use Src\IdentityAndAccess\User\Domain\Contracts\UserRepositoryContract;

class RegisterUseCase
{
    public function __construct(
        private UserRepositoryContract $repository
    ) {}

    public function __invoke(array $data): \App\Models\User
    {
        $user = new DomainUser(
            new Name($data['name']),
            new Email($data['email']),
            new Password($data['password']),
        );

        return $this->repository->save($user);
    }
}