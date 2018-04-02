<?php

namespace Epam\Rules;

use Epam\Exceptions\WrongTypeException;

class Date extends AbstractRule
{
    protected $format;

    public function __construct($format)
    {
        parent::__construct($format);
        if(! is_string($format)) throw new WrongTypeException('Invalid format! Try this: \'Y-m-d\'');

        $this->format = $format;
        date_default_timezone_set('Europe/Kiev');
    }

    protected function handle($data)
    {
        $date = \DateTime::createFromFormat($this->format, $data);

        return $date && $date->format($this->format) == $data;
    }
}