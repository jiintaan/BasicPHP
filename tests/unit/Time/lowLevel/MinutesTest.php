<?php

namespace jiintaan\basicphp;

use jiintaan\basicphp\Exception\DataValidaionFailException;
use jiintaan\basicphp\UtilityStuff\time\lowLevel\Month;
use PHPUnit\Framework\TestCase;

/**
 * @covers \jiintaan\basicphp\UtilityStuff\time\Month
 * @uses \jiintaan\basicphp\Exception\DataValidaionFailException
 */
class MinutesTest extends TestCase
{
    /**
     * @var Month */
    private $subject;

    /** @var int */
    private $expectedTimeAmount;

    protected function setUp(): void
    {
        $this->expectedTimeAmount = 20;
        $this->subject = Month::fromInt($this->expectedTimeAmount);

    }

    public function testCanCreate(): void
    {
        $this->subject = Month::fromInt($this->expectedTimeAmount);
        self::assertEquals($this->expectedTimeAmount,$this->subject->asInt());
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
