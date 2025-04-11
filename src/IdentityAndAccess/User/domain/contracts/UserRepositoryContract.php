<?php

declare(strict_types=1);

namespace Src\IdentityAndAccess\User\Domain\Contracts;

use Src\IdentityAndAccess\User\Domain\Entities\User;

interface UserRepositoryContract
{
    public function save(User $user): \App\Models\User;

    public function findByEmail(string $email): ?\App\Models\User;
}