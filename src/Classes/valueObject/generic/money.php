<?php

declare(strict_types = 1);
namespace Calculator\ValueObject\Generic;

abstract class Money
{
	protected $money; 

	protected function __construct(int $money)
	{
		$this->$money = $money;
	}

	abstract public static function fromValue($money);

	protected static function ensureMoneyIsValid($money)
	{
		if (is_float($money) === false && is_int($money) === false){
			throw new \Exception("Bitte eine Zahl eingeben");
		}
		
		if ($money < 0) {
			throw new \Exception("Startkapital kann nicht negativ sein", 1);
		}
	}

	protected static function convertMoney($money): int
	{
		$money = $money * 100;
		$money = floor($money);
		$money = (int)$money; 

		return $money;
	}

	public function getMoney(): int
	{
		return $this->money;
	}

	public function __toString(): string
	{
		return (string) number_format($this->money / 100, 2, ",", ".");
	}
}