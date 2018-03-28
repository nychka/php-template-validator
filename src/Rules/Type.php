<?php

namespace Epam\Rules;

use Epam\Exceptions\RuleNotPassedException;
use \Epam\Validatable;
use \Epam\Exceptions\WrongTypeException;

class Type implements Validatable
{
    private $type;

    public function __construct($type)
    {
        if(! is_string($type)) throw new WrongTypeException('Only these types are supported: string | integer | boolean | object | array | NULL');

        $this->type = $type;
    }

    public function validate($data)
	{
	    $currentType = gettype($data);

		if($this->type === $currentType){
		    return true;
        }else{
		    throw new RuleNotPassedException("Expected type '%s', but '%s'");
        }
	}
}