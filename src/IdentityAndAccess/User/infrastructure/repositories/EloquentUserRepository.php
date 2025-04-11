<?php

declare(strict_types=1);

namespace Src\IdentityAndAccess\User\Infrastructure\Repositories;

use App\Models\User as EloquentUser;
use Src\IdentityAndAccess\User\Domain\Entities\User;
use Src\IdentityAndAccess\User\Domain\Contracts\UserRepositoryContract;

class EloquentUserRepository implements UserRepositoryContract
{
    public function save(User $user): EloquentUser
    {
        return EloquentUser::create([
            'name' => $user->getName()->value(),
            'email' => $user->getEmail()->value(),
            'password' => bcrypt($user->getPassword()->value()),
        ]);
    }

    public function findByEmail(string $email): ?EloquentUser
    {
        return EloquentUser::where('email', $email)->first();
    }
}