<?php

namespace Epam\Test\Rules;

use Epam\Rules\Password;

class PasswordTest extends \PHPUnit_Framework_TestCase
{
    public function testPasswordIsValidWhenLengthMinimumEightCharacters()
    {
        $rule = new Password();

        $this->assertTrue($rule->validate('01234567'));
    }

    public function testPasswordInvalidWhenLengthLessThanEightCharacters()
    {
        $rule = new Password();

        $this->assertFalse($rule->validate('0123456'));
    }
}