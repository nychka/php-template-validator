<?php

namespace Epam;

use Epam\Exceptions\RuleNotPassedException;

class Validator implements Validatable
{
	private $rules;
	private $errors = [];

	public function __construct(Array $rules = [])
	{
		$this->rules = $rules;
	}

	public function validate($data)
	{
		foreach($data as $key => $value) {
			$rules = $this->rules[$key];

			foreach($rules as $rule) {
			    if(!$rule->validate($value)){
			        $this->errors[] = $rule->error();
                }
			}
		}

		return $this->isValid();
	}

	public function isValid()
    {
        return count($this->errors) === 0;
    }

	public function errors()
    {
        return $this->errors;
    }
}