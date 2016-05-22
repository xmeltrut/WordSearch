<?php

namespace WordSearch\Test;

use WordSearch\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $this->assertInstanceOf(
            '\\WordSearch\\Puzzle',
            Factory::create(['foo', 'bar'])
        );
    }
}
