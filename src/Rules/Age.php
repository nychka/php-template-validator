<?php

namespace Epam\Rules;

class Age extends AbstractRule
{
    protected $age;
    protected $format = 'Y-m-d';

    public function __construct($option)
    {
        parent::__construct($option);

        $this->age = $option;
        $this->today = date($this->format);
    }

    protected function handle($data)
    {
        $diff = date_diff(date_create($data), date_create($this->today));
        $age = $diff->format('%y');

        return $this->age == $age;
    }
}