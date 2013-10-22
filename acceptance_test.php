#!/usr/bin/env php
<?php

include __DIR__ .'/vendor/autoload.php';

function doTest($offset, $total)
{

//----------------------------------------------------------------------------------------------------------------------
// Invoke your page enumerator here
//----------------------------------------------------------------------------------------------------------------------

    $nav = new Navigator(10);
    return strval($nav->accept(array('total_rows' => $total, 'offset' => $offset)));
}

assert_options(ASSERT_BAIL, 1);
assert_options(ASSERT_CALLBACK, function () { echo "\nFailed\n\n"; exit (1); });

foreach ([
    ['[1]', 0, 0],
    ['[1]', 0, 10],
    ['[1] 2', 0, 20],
    ['[1] 2 3', 0, 30],
    ['[1] 2 3 4', 0, 40],
    ['[1] 2 3 4 5', 0, 50],
    ['[1] 2 3 4 5', 0, 60],
    ['[1] 2 3 4 5', 0, 70],
    ['[1] 2 3 4 5', 9, 70],
    ['1 [2] 3 4 5', 10, 70],
    ['1 2 [3] 4 5', 20, 70],
    ['2 3 [4] 5 6', 30, 70],
    ['3 4 [5] 6 7', 40, 70],
    ['3 4 5 [6] 7', 50, 70],
    ['3 4 5 6 [7]', 60, 70],
    ['3 4 5 6 [7]', 69, 70],
] as $case ) {

    list($expected, $offset, $total) = $case;

    $actual = doTest($offset, $total);

    echo 'Expected: ' . $expected . ' Actual: ' . $actual . "\n";
    assert ($expected === $actual);
}

echo "\nOk\n\n";

