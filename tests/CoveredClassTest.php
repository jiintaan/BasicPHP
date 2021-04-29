<?php declare(strict_types=1);

use jiintaan\basicphp\CoveredClass;
use PHPUnit\Framework\TestCase;


/**
 * @covers \jiintaan\basicphp\CoveredClass
 */
class CoveredClassTest extends TestCase
{
    public function testCoveredFunctionReturns1()
    {
        $subject = new CoveredClass();
        self::assertEquals(1,$subject->coveredFunction());
    }
}