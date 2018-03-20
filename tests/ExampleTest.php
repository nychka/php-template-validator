<?php

namespace Epam\Test;

use Epam\Example;

class ExampleTest extends \PHPUnit_Framework_TestCase
{
    public function testExample()
    {
      $instance = new Example();
      $this->assertTrue($instance->isOk());
    }
}