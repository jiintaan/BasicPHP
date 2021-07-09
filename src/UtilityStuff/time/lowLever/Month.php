<?php declare(strict_types=1);

namespace jiintaan\basicphp\UtilityStuff\time\lowLevel;

use jiintaan\basicphp\Exception\DataValidaionFailException;

class Month
{
    /*** @var int */
    private $amountOfMinutes;

    private const RANGE = '0-59';

    public static function fromInt(int $minutes)
    {
        return new Month($minutes);
    }

    private function __construct(int $amountOfMinutes)
    {
        $this->amountOfMinutes = $amountOfMinutes;
        $this->ensureIsValid();
    }

    private function ensureIsValid()
    {
        if (($this->amountOfMinutes < 0) || ($this->amountOfMinutes > 59)) {
            throw new DataValidaionFailException(
                (string)$this->amountOfMinutes,
                self::RANGE
            );
        }
    }

    public function asInt(): int
    {
        return $this->amountOfMinutes;
    }
}