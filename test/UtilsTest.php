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

    public function testStringToArray()
    {
        $this->assertEquals(['a', 'b', 'c'], Utils::stringToArray('abc'));
    }
}
