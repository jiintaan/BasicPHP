<?php declare(strict_types=1);

namespace jiintaan\basicphp;

class CashAmmount
{

    /** @var int */
    private $ammountInCents;

    public static function fromCents(int $amountInCents)
    {
        return new CashAmmount($amountInCents);
    }

    public static function fromEuro(float $amountInEuro)
    {
        return new CashAmmount((int) $amountInEuro * 100);
    }


    private function __construct(int $ammountInCents)
    {
        $this->ammountInCents = $ammountInCents;
    }

    public function asCents(): int
    {
        return $this->ammountInCents;
    }

    public function asEuro(): float
    {
        return ((float) $this->ammountInCents ) / 100;
    }
}