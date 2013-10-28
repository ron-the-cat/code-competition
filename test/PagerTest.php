<?php

namespace RonTheCat;

class PagerTest extends \PHPUnit_Framework_TestCase
{
    public function testTheSimplestCase()
    {
        $this->assertSame('3 4 [5] 6 7', pager()->printNavigator(40, 1000));
    }

    public function testStartEdgeCondition()
    {
        $this->assertSame('[1] 2 3 4 5', pager()->printNavigator(0, 1000));
    }

    public function testEndEdgeCondition()
    {
        $this->assertSame('96 97 98 99 [100]', pager()->printNavigator(990, 1000));
    }
}

function pager()
{
    return new Pager(10, 5);
}