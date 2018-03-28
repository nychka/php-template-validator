<?php

namespace Epam\Test\Rules;

use Epam\Rules\Type;

class TypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Epam\Exceptions\WrongTypeException
     * @expectedExceptionMessage Only these types are supported: string | integer | boolean | object | array | NULL
     */
    public function testConstructor()
    {
        new Type(false);
    }

    public function testTypeString()
    {
        $rule = new Type('string');

        $this->assertTrue($rule->validate('foo'));
    }

    public function testTypeObject()
    {
        $rule = new Type('object');

        $this->assertTrue($rule->validate($rule));
    }

    public function testTypeArray()
    {
        $rule = new Type('array');

        $this->assertTrue($rule->validate([]));
    }

    public function testTypeInteger()
    {
        $rule = new Type('integer');

        $this->assertTrue($rule->validate(375));
    }

    public function testTypeBoolean()
    {
        $rule = new Type('boolean');

        $this->assertTrue($rule->validate(false));
    }

    public function testTypeNull()
    {
        $rule = new Type('NULL');

        $this->assertTrue($rule->validate(NULL));
    }
}