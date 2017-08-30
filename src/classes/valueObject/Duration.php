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

    /**
     * @todo hier ist ein BUG ... duration kann kein float sein, wenn wir in der fromValue nur int zulassen.
     * @param $duration
     * @throws \Exception
     */
    protected static function ensureDurationIsValid($duration): void
    {
        if (is_float($duration) === false && is_int($duration) === false) {
            throw new \Exception('Bitte eine Zahl eingeben', 1);
        }

        if ($duration <= 0) {
            throw new \Exception('Was keine Dauer hat, existiert nicht!', 1);
        }
    }

    protected static function convertDuration($duration): int
    {
        return (int) ceil($duration * 12);
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function __toString(): string
    {
        return (string) number_format(ceil($this->duration / 12), 0, ',', '.');
    }
}
