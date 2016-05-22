<?php

namespace WordSearch\Test;

use WordSearch\WordList;

class WordListTest extends \PHPUnit_Framework_TestCase
{
    public function testClass()
    {
        $wordList = new WordList;
        $wordList->add('test1', 1, 2);
        $wordList->add('test2', 3, 4);

        $this->assertInternalType('string', $wordList->__toString());
        $this->assertCount(2, $wordList);

        $words = [];

        foreach ($wordList as $word) {
            $words[] = $word->word;
        }

        $this->assertEquals(['test1', 'test2'], $words);
    }
}
