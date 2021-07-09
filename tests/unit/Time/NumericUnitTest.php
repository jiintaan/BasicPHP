<?php

namespace jiintaan\basicphp\Time;

use jiintaan\basicphp\CashAmmount;
use jiintaan\basicphp\UtilityStuff\simpleMath\NumericUnit;
use PHPUnit\Framework\TestCase;

/**
 * @covers \jiintaan\basicphp\UtilityStuff\simpleMath\NumericUnit
 * @uses \jiintaan\basicphp\CashAmmount
 */
class NumericUnitTest extends TestCase
{
    /** @var CashAmmount */
    private $expectedAmmountOfMinutes;

    /** @var NumericUnit */
    private $subject;

    protected function setUp(): void
    {
        $this->expectedAmmountOfMinutes = CashAmmount::fromCents(100);

        $this->subject = NumericUnit::fromInt(100);
    }

    public function testCanCreateMinute(): void
    {
        self::assertSame($this->expectedAmmountOfMinutes->asCents(), $this->subject->asInt());
    }
}
