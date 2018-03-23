<?php

namespace Epam\Test;

use Epam\Validator;
use Epam\Validatable;
use Epam\Rules\Required;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
	public function testIsImplementsValidatable()
	{
		$instance = new Validator();

		$this->assertInstanceOf(Validatable::class, $instance);
	}

	public function testValidateWithRequiredRule()
	{
		$data = ['foo' => 'bar'];
		$rules = ['foo' => [new Required()]];
		$validator = new Validator($rules);

		$this->assertTrue($validator->validate($data));
	}

	public function testValidateWithRequiredRuleWhenEmptyString()
	{
		$data = ['foo' => ''];
		$rules = ['foo' => [new Required()]];
		$validator = new Validator($rules);

		$this->assertFalse($validator->validate($data));
	}
}