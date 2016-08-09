<?php

namespace WordSearch\Test;

use WordSearch\Utils;

class UtilsTest extends \PHPUnit_Framework_TestCase
{
    public function testIntegerAsOptions()
    {
        $options = Utils::integerAsOptions(2);

        $this->assertInternalType('array', $options);
        $this->assertCount(3, $options);
    }

    public function testStringLength()
    {
        $this->assertEquals(5, Utils::stringLength('hello'));
        $this->assertEquals(5, Utils::stringLength('wörld'));
    }

    public function testStringToArray()
    {
        $this->assertEquals(['a', 'b', 'c'], Utils::stringToArray('abc'));

        if (function_exists('mb_substr')) {
            $this->assertEquals(['ö'], Utils::stringToArray('ö'));
        }
    }

    public function testUppercaseString()
    {
        $this->assertEquals('TEST', Utils::uppercaseString('test'));

        if (function_exists('mb_strtoupper')) {
            $this->assertEquals('ÄÖ', Utils::uppercaseString('äö'));
        }
    }
}
