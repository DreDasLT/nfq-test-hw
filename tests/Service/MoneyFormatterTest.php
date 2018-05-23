<?php
/**
 * Created by PhpStorm.
 * User: t0000654
 * Date: 5/24/18
 * Time: 12:35 AM
 */

namespace App\Tests\Service;

use App\Service\MoneyFormatter;
use App\Service\NumberFormatter;
use PHPUnit\Framework\TestCase;


class MoneyFormatterTest extends TestCase
{
    public function testFormatEur()
    {
        $numberFormatter = $this->createMock(NumberFormatter::class);
        $numberFormatter->expects($this->once())
            ->method('format')
            ->with(2835779)
            ->willReturn('2.84M');
        $moneyFormatter = new MoneyFormatter($numberFormatter);
        $this->assertEquals($moneyFormatter->formatEur(2835779), '2.84M €');
    }
    public function testFormatUsd()
    {
        $numberFormatter = $this->createMock(NumberFormatter::class);
        $numberFormatter->expects($this->once())
            ->method('format')
            ->with(211.99)
            ->willReturn('211.99');
        $moneyFormatter = new MoneyFormatter($numberFormatter);
        $this->assertEquals($moneyFormatter->formatUsd(211.99), '$211.99');
    }
}