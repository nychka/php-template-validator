<?php

namespace Epam;

class Validator implements Validatable
{
	private $rules;

	public function __construct(Array $rules = [])
	{
		$this->rules = $rules;
	}

	public function validate($data)
	{
		foreach($data as $key => $value)
		{
			$rules = $this->rules[$key];
			foreach($rules as $rule)
			{
				if(! $rule->validate($value)){
					return false;
				}
			}
		}

		return true;
	}
}