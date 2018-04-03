<?php

namespace Epam\Rules;

class Password extends AbstractRule
{
    protected $pattern = '/[A-Za-z0-9]{8,20}/';

    protected function handle($data)
    {
        return (bool) preg_match($this->pattern, $data, $matches);
    }
}