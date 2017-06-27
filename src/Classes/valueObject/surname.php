<?php

declare(strict_types = 1);
namespace Calculator\ValueObject;
use Calculator\ValueObject\Generic\Name;

class Surname extends Name
{
    public static function fromString(string $surname): self
    {
        parent::ensureNameIsValid($surname);
        $surname = parent::convertName($surname);
        return new self($surname);
    }
}