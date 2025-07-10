<?php

namespace WordSearch\Test;

use PHPUnit\Framework\TestCase;
use WordSearch\Generator;
use WordSearch\Puzzle;

class GeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $generator = new Generator(['foo', 'bar']);

        $this->assertInstanceOf(Puzzle::class, $generator->generate());
    }
}
