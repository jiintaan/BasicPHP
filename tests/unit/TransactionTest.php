<?php

namespace jiintaan\basicphp;

use PHPUnit\Framework\TestCase;

/**
 * @covers \jiintaan\basicphp\Transaction
 * @uses \jiintaan\basicphp\CashAmmount
 */
class TransactionTest extends TestCase
{

    /** @var CashAmmount */
    private $expectedCashAmmount;

    /** @var Transaction */
    private $subject;

    /** @var CashAmmount */
    private $expectedDateOfPayment;

    protected function setUp(): void
    {
        $this->expectedCashAmmount = CashAmmount::fromCents(100);
        $this->expectedDateOfPayment = null;
        $this->subject = new Transaction($this->expectedCashAmmount);
    }

    public function testCanGetTransactionAmount(): void
    {

        self::assertSame($this->expectedCashAmmount,$this->subject->getCashAmmount());
    }

    public function testCanGetTransactionStartingDate(): void
    {
        self::assertSame($this->date ,$this->subject->getDateOfPayment());
    }
}
