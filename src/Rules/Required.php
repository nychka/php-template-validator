<?php

namespace Epam\Rules;

use Epam\Rules\AbstractRule;

class Required extends AbstractRule
{
    protected $errorMessage = 'Rule Required is not valid!';

    protected function handle($data)
    {
        return !is_null($data);
    }
}