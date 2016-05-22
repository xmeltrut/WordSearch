<?php

namespace WordSearch\Test\Transformer;

use WordSearch\Transformer\HtmlTransformer;
use WordSearch\Word;

class HtmlTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testTransform()
    {
        $puzzle = $this->getMockBuilder('\\WordSearch\\Puzzle')
                       ->disableOriginalConstructor()
                       ->getMock();
        $puzzle->method('toArray')->willReturn([['A']]);
        $puzzle->method('getWordList')->willReturn([
            new Word('test1', 1, 1),
            new Word('test2', 2, 2)
        ]);

        $transformer = new HtmlTransformer($puzzle);

        $htmlGrid = $transformer->grid();
        $this->assertInternalType('string', $transformer->grid());

        $htmlWordList = $transformer->wordList();
        $this->assertInternalType('string', $transformer->wordList());
        $this->assertRegexp('/test1/', $htmlWordList);
        $this->assertRegexp('/test2/', $htmlWordList);
    }
}
