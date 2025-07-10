<?php

namespace WordSearch\Test;

use PHPUnit\Framework\TestCase;
use WordSearch\Puzzle;
use WordSearch\WordList;

class PuzzleTest extends TestCase
{
    public function testExports()
    {
        $puzzle = new Puzzle([['A']], new WordList());

        $this->assertIsArray($puzzle->toArray());
        $this->assertIsString($puzzle->__toString());
        $this->assertInstanceOf(WordList::class, $puzzle->getWordList());
    }
}
