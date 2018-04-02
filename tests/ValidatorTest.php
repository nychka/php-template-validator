<?php

namespace Epam\Test;

use Epam\Exceptions\WrongTypeException;
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
        $this->assertEquals($validator->errors(), ['foo' => ['Rule Epam\Rules\Type is not valid!']]);
    }

    public function testValidateWithTwoRulesWhenBothInvalid()
    {
        $data = ['foo' => null];
        $rules = ['foo' => [new Rules\Required(), new Rules\Type('string')]];
        $validator = new Validator($rules);

        $this->assertFalse($validator->validate($data));
        $this->assertEquals($validator->errors(), ['foo' => ['Rule Epam\Rules\Required is not valid!', 'Rule Epam\Rules\Type is not valid!']]);
    }

    public function testNotRequiredDataAreValid()
    {
        $data = ['foo' => 'hello'];
        $rules = [
            'foo' => [ new Rules\Required(), new Rules\Type('string') ],
            'bar' => [ new Rules\Type('integer') ]
        ];
        $validator = new Validator($rules);

        $this->assertTrue($validator->validate($data));
    }

    public function testRequiredDataAreInvalidWhenNotExist()
    {
        $data = ['bar' => 123];
        $rules = [
            'foo' => [ new Rules\Required(), new Rules\Type('string') ],
            'bar' => [ new Rules\Type('integer') ]
        ];
        $validator = new Validator($rules);

        $this->assertFalse($validator->validate($data));
    }

    public function testDataTypeAsStdObject()
    {
        $data = new \stdClass();
        $data->foo = 'hello';
        $data->bar = false;

        $rules = [
            'foo' => [ new Rules\Required(), new Rules\Type('string') ],
            'bar' => [ new Rules\Type('integer') ]
        ];
        $validator = new Validator($rules);

        $this->assertFalse($validator->validate($data));
        $this->assertEquals(['bar' => ['Rule Epam\Rules\Type is not valid!']], $validator->errors());
    }

    /**
     * @expectedException Epam\Exceptions\WrongTypeException
     */
    public function testValidatorWithInvalidData()
    {
        $validator = new Validator(['foo' => [ new Rules\Required()]]);

        $validator->validate('foo');
    }
}