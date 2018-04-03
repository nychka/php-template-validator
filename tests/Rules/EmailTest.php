<?php

namespace Epam\Test\Rules;

use Epam\Rules\Email;

class EmailTest extends \PHPUnit_Framework_TestCase
{
    public function testEmail()
    {
        $rule = new Email();

        $this->assertTrue($rule->validate('ivan_petrov@mail.com'));
    }

    public function testEmailWhenIncludesSpecialCharacters()
    {
        $rule = new Email();

        $this->assertFalse($rule->validate('ivan_petrov#mail.com'));
    }

    public function testEmailWhenDomainIsInvalid()
    {
        $rule = new Email();

        $this->assertFalse($rule->validate('ivan_petrov@mailcom'));
    }
}