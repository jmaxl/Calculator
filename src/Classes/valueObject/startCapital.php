<?php

declare(strict_types = 1);
namespace Calculator\ValueObject;
use Calculator\ValueObject\Generic\Money;

class StartCapital extends Money
{
	public static function fromValue($startCapital): self
	{
			parent::ensureMoneyIsValid($startCapital);
			$startCapital = parent::convertMoney($startCapital);
			return new self($startCapital);
	}
}