<?php

declare(strict_types = 1);
namespace Calculator\ValueObject;
use Calculator\ValueObject\Generic\Name;


class Firstname extends Name
{
    public static function fromString(string $firstname): self
    {
        parent::ensureNameIsValid($firstname);
        $firstname = parent::convertName($firstname);
        return new self($firstname);
    }
}