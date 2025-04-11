<?php

declare(strict_types=1);

namespace Src\IdentityAndAccess\User\Domain\ValueObjects;

use InvalidArgumentException;

class Name
{
    public function __construct(private string $value)
    {
        if (empty($value) || strlen($value) < 3) {
            throw new InvalidArgumentException("El nombre debe tener al menos 3 caracteres.");
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}