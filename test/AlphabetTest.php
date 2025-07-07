<?php

namespace WordSearch\Test;

use PHPUnit\Framework\TestCase;
use WordSearch\Alphabet\English;

class AlphabetTest extends TestCase
{
    public function testRandomLetter()
    {
        $alphabet = new English;
        $letter = $alphabet->randomLetter();

        $this->assertIsString($letter);
        $this->assertEquals(1, strlen($letter));
    }
}
