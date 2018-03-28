<?php

namespace Epam\Test\Rules;

use Epam\Rules\Required;

class RequiredTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->rule = new Required();
        $this->errorMessage = 'Rule Required is not valid!';
    }

    public function testIsValidWhenNull()
    {
        $this->assertFalse($this->rule->validate(null));
        $this->assertFalse($this->rule->isValid());
    }

    public function testIsValidWhenNotNull()
    {
        $this->assertTrue($this->rule->validate(1));
        $this->assertTrue($this->rule->isValid());
    }

    public function testErrorMessage()
    {
        $this->rule->validate(null);

        $this->assertEquals($this->errorMessage, $this->rule->error());
    }

    /**
     * @expectedException Epam\Exceptions\PropertyNotDefinedException
     */
    public function testErrorMessageWhenNotDefined()
    {
        $this->rule->error();
    }
}