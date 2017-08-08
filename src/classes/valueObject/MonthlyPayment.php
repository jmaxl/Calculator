<?php

declare(strict_types = 1);
namespace Calculator\ValueObject;
use Calculator\ValueObject\Generic\Money;

class MonthlyPayment extends Money
{
	public static function fromValue($monthlyPayment): self
	{
		self::ensureMonthlyPaymentIsValid($monthlyPayment);
		$monthlyPayment = parent::convertMoney($monthlyPayment);
		return new self($monthlyPayment);
	}

	protected static function ensureMonthlyPaymentIsValid($monthlyPayment): void
	{
		parent::ensureMoneyIsValid($monthlyPayment);

		if ($monthlyPayment <= 0) {
			throw new \Exception('Wer nichts einzahlt, der gewinnt auch nix!', 1);
		}
	}

	public function isGreaterThan(MonthlyPayment $monthlyPayment): bool
    {
        return $this->getMoney() > $monthlyPayment->getMoney();
    }

    public static function firstIsGreaterThanSecond(MonthlyPayment $monthlyPayment1, MonthlyPayment $monthlyPayment2): bool
    {
        return $monthlyPayment1->getMoney() > $monthlyPayment2->getMoney();
    }
}


