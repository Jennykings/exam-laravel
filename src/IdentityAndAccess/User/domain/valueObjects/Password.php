<?php

declare(strict_types=1);

namespace Src\IdentityAndAccess\User\Domain\ValueObjects;

use InvalidArgumentException;

class Password
{
    public function __construct(private string $value)
    {
        if (strlen($value) < 6) {
            throw new InvalidArgumentException("La contraseña debe tener al menos 6 caracteres.");
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}