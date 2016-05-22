<?php

namespace WordSearch\Test;

use WordSearch\Puzzle;
use WordSearch\WordList;

class PuzzleTest extends \PHPUnit_Framework_TestCase
{
    public function testExports()
    {
        $puzzle = new Puzzle([['A']], new WordList);

        $this->assertInternalType('array', $puzzle->toArray());
        $this->assertInternalType('string', $puzzle->__toString());
        $this->assertInstanceOf('\\WordSearch\\WordList', $puzzle->getWordList());
    }
}
