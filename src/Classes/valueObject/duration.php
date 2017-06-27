<?php

declare(strict_types = 1);
namespace Calculator\ValueObject;

class Duration
{
    protected $duration;

    protected function __construct(int $duration)
    {
        $this->duration = $duration;
    }

    public static function fromValue(int $duration): self
    {
        self::ensureDurationIsValid($duration);
        $duration = self::convertDuration($duration);
        return new self($duration);
    }

    protected static function ensureDurationIsValid(int $duration)
    {
        if (is_float($duration) === false and is_int($duration) === false) {
            throw new \Exception("Bitte eine Zahl eingeben", 1);
        }

        if ($duration <= 0) {
            throw new \Exception("Was keine Dauer hat, existiert nicht!", 1);
        }
    }

    protected static function convertDuration($duration): int
    {
        return $duration = (int) ceil($duration * 12);
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function __toString(): string
    {
        return (string) number_format(ceil($this->duration / 12), 0, ",", ".");
    }
}
