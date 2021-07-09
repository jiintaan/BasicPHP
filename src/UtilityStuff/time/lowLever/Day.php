<?php declare(strict_types=1);

namespace jiintaan\basicphp\UtilityStuff\time\lowLevel;

use jiintaan\basicphp\Exception\DataValidaionFailException;

class Day
{
    /*** @var int */
    private $amountOfHours;

    private const RANGE = '0-23';

    public static function fromInt(int $hours): self
    {
        return new self($hours);
    }

    private function __construct(int $amountOfHours)
    {
        $this->amountOfHours = $amountOfHours;
        $this->ensureIsValid();
    }

    private function ensureIsValid(): void
    {
        if (($this->amountOfHours < 0) || ($this->amountOfHours > 23)) {
            throw new DataValidaionFailException(
                (string)$this->amountOfHours,
                self::RANGE
            );
        }
    }

    public function asInt(): int
    {
        return $this->amountOfHours;
    }
}