<?php

declare(strict_types=1);

namespace Src\CustomerManagement\Customer\Domain\ValueObjects;

use InvalidArgumentException;

final class CustomerEmail
{
    private string $value;

    public function __construct(string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('El email no es válido.');
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}