<?php

namespace WordSearch\Test;

use PHPUnit\Framework\TestCase;
use WordSearch\Exception;

class ExceptionTest extends TestCase
{
    public function testException()
    {
        $exception = new Exception('test');
        $this->assertEquals('test', $exception->getMessage());
    }
}
