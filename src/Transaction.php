<?php declare(strict_types=1);

namespace jiintaan\basicphp;


class Transaction
{

    public function __construct(CashAmmount $cashAmmount)
    {
        $this->cashAmmount = $cashAmmount;
    }


    public function getCashAmmount(): CashAmmount
    {
        return $this->cashAmmount;
    }

    public function getDateOfPayment()
    {
    }
}