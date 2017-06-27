<?php

declare(strict_types = 1);
namespace Calculator\ValueObject\Generic;

abstract class Percentage
{
    const DELIMITER = 4;

    protected $percentage;

    protected function __construct(float $percentage)
    {
        $this->percentage = $percentage;
    }

    abstract public static function fromValue($percentage);

    protected static function ensurePercentageIsValid($percentage)
    {
        if (is_float($percentage) === false and is_int($percentage) === false) {
            throw new Exception("Bitte eine Zahl eingeben!", 1);
        }
    }

    protected static function convertPercentage($percentage, $delimeter = self::DELIMITER): float
    {
        return $percentage = (float) round($percentage/100, $delimeter);
    }

    public function getPercentage(): float
    {
        return $this->percentage;
    }

    public function __toString(): string
    {
        return (string) $this->percentage;
    }
}