<?php

namespace Epam\Rules;

use Epam\Exceptions\RuleNotPassedException;
use \Epam\Validatable;
use \Epam\Exceptions\WrongTypeException;

class Type extends AbstractRule
{
    private $type;
    protected $errorMessage = 'Rule Type is not valid!';

    public function __construct($type)
    {
        if(! is_string($type)) throw new WrongTypeException('Only these types are supported: string | integer | boolean | object | array | NULL');

        $this->type = $type;
    }

    public function handle($data)
	{
	    $currentType = gettype($data);

		return $this->type === $currentType;
	}
}