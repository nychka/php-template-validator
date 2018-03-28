<?php

namespace Epam\Test;

use Epam\Validator;
use Epam\Validatable;
use Epam\Rules;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
	public function testIsImplementsValidatable()
	{
		$instance = new Validator();

		$this->assertInstanceOf(Validatable::class, $instance);
	}

	public function testValidateWhenValid()
	{
		$data = ['foo' => 'bar'];
		$rules = ['foo' => [new Rules\Required()]];
		$validator = new Validator($rules);

		$this->assertTrue($validator->validate($data));
	}

	public function testValidateWhenInvalid()
    {
        $data = ['foo' => ''];
        $rules = ['foo' => [new Rules\Required()]];
        $validator = new Validator($rules);

        $this->assertFalse($validator->validate($data));
    }

    public function testValidateWithTwoRules()
    {
        $data = ['foo' => 123];
        $rules = ['foo' => [new Rules\Required(), new Rules\Type('string')]];
        $validator = new Validator($rules);

        $this->assertFalse($validator->validate($data));
        $this->assertEquals($validator->errors(), ['expected string, but integer given']);
    }
}