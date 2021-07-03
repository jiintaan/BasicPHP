<?php

namespace jiintaan\basicphp;

use PHPUnit\Framework\TestCase;

/**
 * @covers \jiintaan\basicphp\CashAmmount
 */
class CashAmmountTest extends TestCase
{

    /** @var int */
    private $expectedAmmountInCent;

    /** @var float */
    private $expectedAmmountInEuro;

    /** @var CashAmmountTest */
    private $subject;

    protected function setUp(): void
    {
        $this->expectedAmmountInCent = 100;
        $this->expectedAmmountInEuro = 1.0;
        $this->subject = CashAmmount::fromCents($this->expectedAmmountInCent);
    }

    public function testCanCreateFromEuro()
    {
        $subject = CashAmmount::fromEuro($this->expectedAmmountInCent);
        self::assertInstanceOf(CashAmmount::class, $subject);
    }

    public function testCanGetAsCents()
    {
        self::assertEquals($this->expectedAmmountInCent, $this->subject->asCents());
    }

    public function testCanGetAsEuro()
    {
        self::assertEquals($this->expectedAmmountInEuro, $this->subject->asEuro());
    }
}
