<?php declare(strict_types=1);

namespace jiintaan\basicphp\Exception;

use Exception;

class DataValidaionFailException extends Exception
{

    public function __construct(string $value, string $range)
    {
        $string =
            sprintf(
                'Value of Unit %s is invalid, must be between %s',
                $value,
                $range
            );
        parent::__construct($string);
    }
}