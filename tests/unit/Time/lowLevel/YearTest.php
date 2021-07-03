<?php

namespace jiintaan\basicphp;

use jiintaan\basicphp\Exception\DataValidaionFailException;
use jiintaan\basicphp\UtilityStuff\time\lowLevel\Year;
use PHPUnit\Framework\TestCase;

/**
 * @covers \jiintaan\basicphp\UtilityStuff\time\Year
 * @uses \jiintaan\basicphp\Exception\DataValidaionFailException
 */
class YearTest extends TestCase
{
    /**
     * @var Year */
    private $subject;

    /** @var int */
    private $expectedTimeAmount;

    protected function setUp(): void
    {
        $this->expectedTimeAmount = 20;
        $this->subject = Year::fromInt($this->expectedTimeAmount);

    }

    public function testCanCreate(): void
    {
        $this->subject = Year::fromInt($this->expectedTimeAmount);
        self::assertEquals($this->expectedTimeAmount,$this->subject->asInt());
    }
    /**
     * @dataProvider provideIllegalValues
     */
    public function testThrowsExceptionWhenAmmountIsIllegal(int $illigalValuue): void
    {
        $this->expectExceptionObject(new DataValidaionFailException( $illigalValuue, '0-59'));
        $subject = Year::fromInt($illigalValuue);
    }

    public function provideIllegalValues()
    {
        return
            [
                [2201],
                [1899],
                [-1],

            ];
    }

}
