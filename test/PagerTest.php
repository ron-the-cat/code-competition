<?php

namespace RonTheCat;

class PagerTest extends \PHPUnit_Framework_TestCase
{
    public function testTheSimplestCase()
    {
        $this->assertSame('3 4 [5] 6 7', pager()->printNavigator(40, 100));
    }
}

function pager()
{
    return new Pager(10, 5);
}