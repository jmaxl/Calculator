<?php

declare(strict_types = 1);
namespace Calculator\ValueObject;
use Calculator\ValueObject\Generic\Percentage;

class Dynamic extends Percentage
{
    const DELIMETER = 2;

    public static function fromValue($dynamic)
    {
        self::ensureDynamicIsValid($dynamic);
        $dynamic = parent::convertPercentage($dynamic, self::DELIMETER);
        return new self($dynamic);
    }

    protected static function ensureDynamicIsValid($dynamic)
    {
        parent::ensurePercentageIsValid($dynamic);

        if ($dynamic <= 0) {
            throw new \Exception("Negative Dynamik ist Quatsch!", 1);
        }
    }
}