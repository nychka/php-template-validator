<?php

namespace Epam\Rules;

use Epam\Exceptions\RuleNotPassedException;
use \Epam\Exceptions\WrongTypeException;

class Type extends AbstractRule
{
    private $type;

    public function __construct($type)
    {
        parent::__construct($type);
        if(! is_string($type)) throw new WrongTypeException('Only these types are supported: string | integer | boolean | object | array | NULL');

        $this->type = $type;
    }

    public function handle($data)
	{
	    $currentType = gettype($data);

		return $this->type === $currentType;
	}
}