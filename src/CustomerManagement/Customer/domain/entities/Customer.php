<?php

namespace Src\CustomerManagement\Customer\Domain\Entities;

use Src\CustomerManagement\Customer\Domain\ValueObjects\CustomerEmail;
use Src\CustomerManagement\Customer\Domain\ValueObjects\CustomerName;

class Customer
{
    private int $id;
    private CustomerName $name;
    private CustomerEmail $email;

    public function __construct(CustomerName $name, CustomerEmail $email, int $id = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): CustomerName
    {
        return $this->name;
    }

    public function getEmail(): CustomerEmail
    {
        return $this->email;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name->value(),
            'email' => $this->email->value(),
        ];
    }
}