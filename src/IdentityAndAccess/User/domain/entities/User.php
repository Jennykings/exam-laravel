<?php

namespace Src\IdentityAndAccess\User\Domain\Entities;

use Src\IdentityAndAccess\User\Domain\ValueObjects\Email;
use Src\IdentityAndAccess\User\Domain\ValueObjects\Name;
use Src\IdentityAndAccess\User\Domain\ValueObjects\Password;

class User
{
    public function __construct(
        private Name $name,
        private Email $email,
        private Password $password
    ) {}

    public function getName(): Name
    {
        return $this->name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }
}