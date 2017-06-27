<?php

declare(strict_types = 1);
namespace Calculator\ValueObject;
use Calculator\ValueObject\Generic\Percentage;

class Taxes extends Percentage
{
    const DELIMETER = 5;

    public static function fromValue($taxes)
    {
        self::ensureTaxesIsValid($taxes);
        $taxes = parent::convertPercentage($taxes, self::DELIMETER);
        return new self($taxes);
    }

    protected static function ensureTaxesIsValid($taxes)
    {
        parent::ensurePercentageIsValid($taxes);

        if ($taxes <= 0) {
            throw new \Exception("Wenn die Steuern negativ sind, sind wir im Paradies!", 1);
        }
    }
}