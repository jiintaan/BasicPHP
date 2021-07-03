<?php declare(strict_types=1);

namespace jiintaan\basicphp\UtilityStuff\time\lowLevel;

class Moment
{

    /** @var Hours */
    private $hour;

    /** @var Minutes */
    private $minute;

    /** @var Seconds */
    private $second;

    public function __construct(Hours $hour, Minutes $minute, Seconds $second)
    {
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
    }

    public function getHour(): Hours
    {
        return $this->hour;
    }

    public function getMinute(): Minutes
    {
        return $this->minute;
    }

    public function getSecond(): Seconds
    {
        return $this->second;
    }
}