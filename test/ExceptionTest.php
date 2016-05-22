<?php

namespace WordSearch\Test;

use WordSearch\Exception;

class ExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testException()
    {
        $exception = new Exception('test');
        $this->assertEquals('test', $exception->getMessage());
    }
}
