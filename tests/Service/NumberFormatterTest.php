<?php
/**
 * Created by PhpStorm.
 * User: t0000654
 * Date: 5/23/18
 * Time: 10:03 PM
 */

namespace App\Tests\Service;

use App\Service\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    public function getFormatData() {
        return [
            [2835779, '2.84M'],
            [999500, '1.00M'],
            [535216, '535K'],
            [99950, '100K'],
            [27533.78, '27 534'],
            [999.99, '999.99'],
            [999.9999, '1 000'],
            [533.1, '533.10'],
            [66.6666, '66.67'],
            [12.00, '12'],

            [-2835779, '-2.84M'],
            [-999500, '-1.00M'],
            [-535216, '-535K'],
            [-99950, '-100K'],
            [-27533.78, '-27 534'],
            [-999.99, '-999.99'],
            [-999.9999, '-1 000'],
            [-533.1, '-533.10'],
            [-66.6666, '-66.67'],
            [-12.00, '-12'],
        ];
    }

    /**
     *@dataProvider  getFormatData
     */
    public function testFormatter($number, $expected) {
        $formatter = new NumberFormatter();
        $result = $formatter->format($number);
        $this->assertEquals($expected, $result);
    }
}