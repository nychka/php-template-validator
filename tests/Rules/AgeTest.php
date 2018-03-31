<?php

namespace Epam\Test\Rules;

use Epam\Rules\Age;

class RequiredTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->errorMessage = 'Rule Required is not valid!';
    }

    public function testIsValidWhenAgeBelongsAverageHuman()
    {
       $rule = new Age(18);

       $this->assertTrue($rule->validate('2000-03-31'));
    }
}