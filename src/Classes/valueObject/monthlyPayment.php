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

	protected static function ensureMonthlyPaymentIsValid($monthlyPayment)
	{
		parent::ensureMoneyIsValid($monthlyPayment);

		if ($monthlyPayment <= 0) {
			throw new \Exception("Wer nichts einzahlt, der gewinnt auch nix!", 1);
		}
	}

	public function isGreaterThan(MonthlyPayment $monthlyPayment): bool
    {
        if ($this->getMoney() > $monthlyPayment->getMoney()) {
            return true;
        }

        return false;
    }

    public static function firstIsGreaterThanSecond(MonthlyPayment $monthlyPayment1, MonthlyPayment $monthlyPayment2): bool
    {
        if ($monthlyPayment1->getMoney() > $monthlyPayment2->getMoney()) {
            return true;
        }

        return false;
    }
}


