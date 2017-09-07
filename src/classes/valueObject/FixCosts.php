<?php

declare(strict_types = 1);
namespace Calculator\ValueObject;
use Calculator\ValueObject\Generic\Money;


class FixCosts extends Money
{
	public static function fromValue($fixCosts): self
	{
		self::ensureFixCostsIsValid($fixCosts);
		$fixCosts = parent::convertMoney($fixCosts);
		return new self($fixCosts);
	}

	protected static function ensureFixCostsIsValid($fixCosts): void
	{
		parent::ensureMoneyIsValid($fixCosts);

		if ($fixCosts <= 0) {
			throw new \Exception('Wer keine Fixkosten hat, der lebt nicht!', 1);
		}
	}
	
	public function getFixCosts(): float 
    {
        return $this->getMoney() / 100;
    }
}