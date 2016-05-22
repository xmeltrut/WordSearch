<?php

namespace WordSearch\Test;

use WordSearch\Alphabet\English;

class AlphabetTest extends \PHPUnit_Framework_TestCase
{
    public function testRandomLetter()
    {
        $alphabet = new English;
        $letter = $alphabet->randomLetter();

        $this->assertInternalType('string', $letter);
        $this->assertEquals(1, strlen($letter));
    }
}
