<?php

namespace Epam\Rules;

class Required extends AbstractRule
{
    protected $errorMessage = 'Rule Required is not valid!';

    protected function handle($data)
    {
        return !is_null($data);
    }
}