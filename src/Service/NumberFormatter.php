<?php
/**
 * Created by PhpStorm.
 * User: t0000654
 * Date: 5/22/18
 * Time: 4:58 PM
 */

namespace App\Service;


class NumberFormatter
{
    public function format($number) {
        $sign = $number < 0 ? '-' : '';
        $number = $number < 0 ? abs($number) : $number;

        if($number >= 999500) {
            $number = sprintf('%0.2f', round($number / 1000000, 2)) . 'M';
        } elseif ($number >= 99950) {
            $number = round($number / 1000) . 'K';
        } elseif ($number >= 1000) {
            $number = number_format(round($number), 0, '.', ' ');
        } elseif ($number >= 0 && (int)$number !== $number) {
            $number = round($number, 2);
            $number = $number == 1000 ? number_format($number, 0, '.', ' ') : sprintf('%0.2f', $number);
        }
        return $sign . $number;
    }
}