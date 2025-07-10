<?php

namespace WordSearch\Test;

use PHPUnit\Framework\TestCase;
use WordSearch\Factory;

class FactoryTest extends TestCase
{
    public function testCreate()
    {
        $this->assertInstanceOf(
            '\\WordSearch\\Puzzle',
            Factory::create(['foo', 'bar'])
        );
    }
}
