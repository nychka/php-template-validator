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
				try{
                    $rule->validate($value);
                }catch(RuleNotPassedException $e){
				    $this->errors->push($e->getMessage());
				}finally{
                    return false;
                }
			}
		}

		return true;
	}

	public function errors()
    {
        return $this->errors;
    }
}