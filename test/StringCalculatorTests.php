<?php

use PHPUnit\Framework\TestCase;

class StringCalculatorTests extends TestCase
{
    public function test_sum_numbers()
    {
        $this->assertEquals("6", StringCalculator::sum("1,2\n,3"));
    }

    public function test_no_content_is_zero()
    {
        $this->assertEquals("0", StringCalculator::sum(""));
    }
}

class StringCalculator
{
    public static function sum($text)
    {
        if ($text == "") {
            return 0;
        }
        $numbers = self::getNumbers($text);
        $result = self::makeSum($numbers);
        return $result;
    }

    public static function getNumbers($text)
    {
        return preg_split('/,|\\n/', $text);
    }

    public static function makeSum($numbers)
    {
        $result = 0;
        foreach ($numbers as $number) {
            if (is_numeric($number)) {
                $result += $number;
            }
        }
        return $result;
    }
}