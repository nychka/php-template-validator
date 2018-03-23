<?php

namespace Epam\Rules;

use \Epam\Validatable;

class Required implements Validatable
{
	public function validate($data)
	{
		if(is_string($data)){
			return (bool) strlen($data);
		}else if(is_array($data)){
			return ! empty($data);
		}else{
            return ! is_null($data);
        }
	}
}