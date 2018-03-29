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
        $data = ['foo' => null];
        $rules = ['foo' => [new Rules\Required()]];
        $validator = new Validator($rules);

        $this->assertFalse($validator->validate($data));
    }

    public function testValidateWithTwoRulesWhenTypeIsInvalid()
    {
        $data = ['foo' => 123];
        $rules = ['foo' => [new Rules\Required(), new Rules\Type('string')]];
        $validator = new Validator($rules);

        $this->assertFalse($validator->validate($data));
        $this->assertEquals($validator->errors(), ['Rule Type is not valid!']);
    }

    public function testValidateWithTwoRulesWhenBothInvalid()
    {
        $data = ['foo' => null];
        $rules = ['foo' => [new Rules\Required(), new Rules\Type('string')]];
        $validator = new Validator($rules);

        $this->assertFalse($validator->validate($data));
        $this->assertEquals($validator->errors(), ['Rule Required is not valid!', 'Rule Type is not valid!']);
    }
}