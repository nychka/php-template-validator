<?php

namespace Epam\Test\Rules;

use Epam\Rules\Required;

class RequiredTest extends \PHPUnit_Framework_TestCase
{
    public function testIsValidWhenString()
    {
        $rule = new Required();

        $this->assertTrue($rule->validate('foo'));
    }

    public function testIsNotValidWhenEmptyString()
    {
        $rule = new Required();

        $this->assertFalse($rule->validate(''));
    }

    public function testIsValidWhenBoolean()
    {
        $rule = new Required();

        $this->assertTrue($rule->validate(false));
    }

    public function testIsNotValidWhenNull()
    {
        $rule = new Required();

        $this->assertFalse($rule->validate(null));
    }

    public function testIsValidWhenZero()
    {
        $rule = new Required();

        $this->assertTrue($rule->validate(0));
    }

    public function testIsNotValidWhenEmptyArray()
    {
        $rule = new Required();

        $this->assertFalse($rule->validate([]));
    }
}