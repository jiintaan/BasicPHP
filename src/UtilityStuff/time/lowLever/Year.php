<?php declare(strict_types=1);

namespace jiintaan\basicphp\UtilityStuff\time\lowLevel;

use jiintaan\basicphp\Exception\DataValidaionFailException;

class Year
{
    /*** @var int */
    private $amountOfSeconds;

    private const RANGE = '1900-2100';

    public static function fromInt(int $seconds)
    {
        return new self($seconds);
    }

    private function __construct(int $amountOfSeconds)
    {
        $this->amountOfSeconds = $amountOfSeconds;
        $this->ensureIsValid();
    }

    private function ensureIsValid()
    {
        if(($this->amountOfSeconds < 2100) || ($this->amountOfSeconds > 1900))
        {
            throw new DataValidaionFailException(
                (string) $this->amountOfSeconds,
                    self::RANGE
                );
        }
    }

    public function asInt()
    {
        return $this->amountOfSeconds;
    }
}