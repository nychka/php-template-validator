<?php

namespace Epam\Rules;

use Epam\Validatable;
use Epam\Exceptions\PropertyNotDefinedException;

abstract class AbstractRule implements Validatable
{
    protected $hasError = false;
    protected $errorMessage;

    public function __construct($option = NULL)
    {
        $this->errorMessage = sprintf("Rule %s is not valid!", get_class($this));
    }

    abstract protected function handle($data);

    public function validate($data)
    {
        if(! $this->handle($data)){
            $this->hasError = true;
        }

        return $this->isValid();
    }

    public function isValid()
    {
        return !$this->hasError;
    }

    public function error()
    {
        if(!(is_string($this->errorMessage) && strlen($this->errorMessage))){
            throw new PropertyNotDefinedException("Define error message for your rule!");
        }
        
        return $this->errorMessage;
    }
}