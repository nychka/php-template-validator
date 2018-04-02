<?php

namespace Epam\Test\Rules;

use Epam\Rules\Date;

class DateTest extends \PHPUnit_Framework_TestCase
{
    public function testDateFormatYearMonthDay()
    {
        $rule = new Date('Y-m-d');

        $this->assertTrue($rule->validate('1993-02-17'));
    }

    public function testDateFormatDayMonthYear()
    {
        $rule = new Date('d-m-Y');

        $this->assertTrue($rule->validate('31-12-1999'));
    }

    public function testDateFormatWithSemicolon()
    {
        $rule = new Date('d:m:Y');

        $this->assertTrue($rule->validate('31:12:1999'));
    }

    /**
     * @expectedException Epam\Exceptions\WrongTypeException
     */
    public function testInvalidDataInput()
    {
        $rule = new Date(false);

        $this->assertFalse($rule->validate(false));
    }

    public function testDateWhenMonthInvalid()
    {
        $rule = new Date('Y-m-d');

        $this->assertFalse($rule->validate('1993-17-02'));
    }
}