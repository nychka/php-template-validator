<?php

namespace Epam;

use Epam\Exceptions\WrongTypeException;
use Epam\Rules\AbstractRule;
use Epam\Rules\Required;

class Validator implements Validatable
{
	protected $rules;
	protected $errors = [];

	public function __construct(Array $rules = [])
	{
		$this->rules = $rules;
	}

	public function validate($data)
	{
	    $data = $this->structurizeData($data);

		foreach($this->rules as $key => $rules) {
            if(! array_key_exists($key, $data)) continue;

            foreach($rules as $rule) {
                if (! $rule->validate($data[$key])) { $this->addError($key, $rule); }
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

    protected function structurizeData($data)
    {
        if(! (is_array($data) || is_object($data))){
            throw new WrongTypeException('Data type must be array or object!');
        }

         if(is_object($data)){
            $data =  get_object_vars($data);
         }

         foreach($this->rules as $key => $rules){
             foreach($rules as $rule){
                 if(! array_key_exists($key, $data) && $rule instanceof Required){
                     $data[$key] = null;
                 }
             }
         }

         return $data;
    }

    protected function addError($key, AbstractRule $rule)
    {
        $this->errors[$key][] = $rule->error();
    }
}