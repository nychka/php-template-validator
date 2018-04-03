<?php

namespace Epam\Rules;

class Email extends AbstractRule
{
    protected function handle($data)
    {
        return filter_var($data, FILTER_VALIDATE_EMAIL);
    }
}