<?php

declare(strict_types = 1);
namespace Calculator\ValueObject;
use Calculator\ValueObject\Generic\Percentage;

class Rental extends Percentage
{
	public static function fromArray(array $rentalArray): array
    {
        $rentalNew = [];

        foreach ($rentalArray as $rental)
        {
            $rentalNew[] = self::fromValue($rental);
        }

        return $rentalNew;
    }

    public static function fromValue($rental): self
    {
        self::ensureRentalIsValid($rental);
        $rental = parent::convertPercentage($rental);

        return new self($rental);
    }

	protected static function ensureRentalIsValid($rental): void
	{
		parent::ensurePercentageIsValid($rental);

		if ($rental === 0) {
			throw new \Exception('Wenn die Zinsen bei Null sind, brauchst Du dein Geld nicht anlegen!', 1);
		}	
	}

	public function getRental(): float
    {
        return parent::getPercentage();
    }
}
