<?php

declare(strict_types=1);

namespace Src\IdentityAndAccess\User\Domain\ValueObjects;

use InvalidArgumentException;

class Email
{
    public function __construct(private string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("El email no es válido.");
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}