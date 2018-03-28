<?php

namespace Epam\Rules;

use Epam\Validatable;

abstract class AbstractRule implements Validatable
{
    protected $hasError = false;
    protected $errorMessage;

    public function validate($data)
    {
        if(! $this->handle($data)){
            $this->hasError = true;
            return false;
        }

        return true;
    }

    public function isValid()
    {
        return !$this->hasError;
    }

    public function error()
    {
        if(!(is_string($this->errorMessage) && strlen($this->errorMessage))){
            throw new \Epam\Exceptions\PropertyNotDefinedException("Define error message for your rule!");
        }
        
        return $this->errorMessage;
    }

    abstract protected function handle($data);
}