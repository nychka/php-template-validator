<?php

namespace Epam\Test\Rules;

use Epam\Rules\Password;

class PasswordTest extends \PHPUnit_Framework_TestCase
{
    public function testPasswordIsValidWhenLengthMinimumSixCharacters()
    {
        $rule = new Password();

        $this->assertTrue($rule->validate('012345'));
    }

    public function testPasswordInvalidWhenLengthLessThanSixCharacters()
    {
        $rule = new Password();

        $this->assertFalse($rule->validate('01234'));
    }
}