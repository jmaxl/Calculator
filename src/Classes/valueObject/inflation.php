<?php

declare(strict_types = 1);
namespace Calculator\ValueObject;
use Calculator\ValueObject\Generic\Percentage;

class Inflation extends Percentage
{
    public static function fromValue($inflation): self
    {
        parent::ensurePercentageIsValid($inflation);
        $inflation = parent::convertPercentage($inflation);

        return new self($inflation);
    }
}