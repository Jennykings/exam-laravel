<?php

declare(strict_types=1);

namespace Src\CustomerManagement\Customer\Domain\ValueObjects;

final class CustomerEmail
{
	private $value;

	public function __construct(string $Email)
	{
		$this -> value = $Email;
	}

	public function value(): string
	{
		return $this -> value;
	}
}