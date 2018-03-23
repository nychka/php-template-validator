<?php

namespace Epam\Rules;

use \Epam\Validatable;

class Required implements Validatable
{
	public function validate($data)
	{
		if(is_string($data)){
			return strlen($data);
		}else{
			return ! is_null($data);
		}
	}
}