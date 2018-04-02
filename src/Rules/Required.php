<?php

namespace Epam\Rules;

class Required extends AbstractRule
{
    protected function handle($data)
    {
        return !is_null($data);
    }
}