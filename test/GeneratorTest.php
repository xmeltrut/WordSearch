<?php

namespace WordSearch\Test;

use WordSearch\Generator;

class GeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $generator = new Generator(['foo', 'bar']);

        $this->assertInstanceOf('\\WordSearch\\Puzzle', $generator->generate());
    }
}
