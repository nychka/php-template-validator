<?php

namespace Epam\Test\Rules;

use Epam\Rules\Required;

class RequiredTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->rule = new Required();
        $this->errorMessage = 'Rule Epam\Rules\Required is not valid!';
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
        $reflection = new \ReflectionClass(Required::class);
        $errorMessage = $reflection->getProperty('errorMessage');
        $errorMessage->setAccessible(true);
        $errorMessage->setValue($this->rule, null);

        $this->rule->error();
    }
}