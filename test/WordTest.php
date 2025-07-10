<?php

namespace WordSearch\Test;

use PHPUnit\Framework\TestCase;
use WordSearch\Word;

class WordTest extends TestCase
{
    public function testProperties()
    {
        $word = new Word('test', 5, 0);

        $this->assertEquals('test', $word->word);
        $this->assertEquals(5, $word->row);
        $this->assertEquals(0, $word->column);
    }
}
