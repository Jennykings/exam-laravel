<?php

declare(strict_types=1);

namespace Src\CustomerManagement\Customer\Domain\ValueObjects;

final class CustomerName
{
	private $value;

	public function __construct(string $Name)
	{
		$this -> value = $Name;
	}

	public function value(): string
	{
		return $this -> value;
	}
}