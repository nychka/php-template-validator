<?php

namespace Epam\Test\Rules;

use Epam\Rules\Age;

class AgeTest extends \PHPUnit_Framework_TestCase
{
    public function testIsValid()
    {
        $rule = new Age(25);

        $this->assertTrue($rule->validate('1993-02-17'));
    }

    public function testIsNotvalid()
    {
        $rule = new Age(26);

        $this->assertFalse($rule->validate('1993-02-17'));
    }
}