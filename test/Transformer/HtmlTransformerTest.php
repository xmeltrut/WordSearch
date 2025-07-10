<?php

namespace WordSearch\Test\Transformer;

use PHPUnit\Framework\TestCase;
use WordSearch\Transformer\HtmlTransformer;
use WordSearch\Word;

class HtmlTransformerTest extends TestCase
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
        $this->assertIsString($transformer->grid());

        $htmlWordList = $transformer->wordList();
        $this->assertIsString($transformer->wordList());
        $this->assertMatchesRegularExpression('/test1/', $htmlWordList);
        $this->assertMatchesRegularExpression('/test2/', $htmlWordList);
    }
}
