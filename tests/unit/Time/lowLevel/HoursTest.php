<?php

namespace jiintaan\basicphp;

use jiintaan\basicphp\Exception\DataValidaionFailException;
use jiintaan\basicphp\UtilityStuff\time\lowLevel\Hours;
use PHPUnit\Framework\TestCase;

/**
 * @covers \jiintaan\basicphp\UtilityStuff\time\Hours
 * @covers \jiintaan\basicphp\Exception\DataValidaionFailException
 */
class HoursTest extends TestCase
{
    /**
     * @var Hours
     */
    private $subject;

    /** @var CashAmmount */
    private $expectedAmmountOfHours;

    protected function setUp(): void
    {
        $this->expectedAmmountOfHours = 20;

        $this->subject = Hours::fromInt($this->expectedAmmountOfHours);
    }


    public function testCanCreateHours(): void
    {
        self::assertEquals($this->expectedAmmountOfHours, $this->subject->asInt());
    }

    /**
     * @dataProvider provideIllegalValues
     */
    public function testThrowsExceptionWhenAmmountIsIllegal(int $illigalValuue): void
    {
        $this->expectExceptionObject(new DataValidaionFailException( $illigalValuue, '0-23'));
        Hours::fromInt($illigalValuue);
    }

    public function provideIllegalValues()
    {
        return
            [
                [60],
                [-1],
            ];
    }
}
