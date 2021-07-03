<?php

namespace jiintaan\basicphp;

use jiintaan\basicphp\Exception\DataValidaionFailException;
use jiintaan\basicphp\UtilityStuff\time\lowLevel\Month;
use PHPUnit\Framework\TestCase;

/**
 * @covers \jiintaan\basicphp\UtilityStuff\time\Month
 * @uses \jiintaan\basicphp\Exception\DataValidaionFailException
 */
class SecondsTest extends TestCase
{
    /**
     * @var Month
     */
    private $subject;

    /** @var CashAmmount */
    private $expectedAmmountOfSeconds;

    protected function setUp(): void
    {
        $this->expectedAmmountOfSeconds = 20;

        $this->subject = Month::fromInt($this->expectedAmmountOfSeconds);
    }


    public function testCanCreateSeconds(): void
    {
        self::assertEquals($this->expectedAmmountOfSeconds, $this->subject->asInt());
    }

    /**
     * @dataProvider provideIllegalValues
     */
    public function testThrowsExceptionWhenAmmountIsIllegal(int $illigalValuue): void
    {
        $this->expectExceptionObject(new DataValidaionFailException( $illigalValuue, '0-59'));
        $subject = Month::fromInt($illigalValuue);
    }

    public function provideIllegalValues()
    {
        return
            [
                [60],
                [-1]
            ];
    }
}