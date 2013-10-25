This solution's metrics

[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/ron-the-cat/code-competition/badges/quality-score.png?s=d398e5da141bdfa3df45083390e33556b32de3dd)](https://scrutinizer-ci.com/g/ron-the-cat/code-competition/) [![Code Coverage](https://scrutinizer-ci.com/g/ron-the-cat/code-competition/badges/coverage.png?s=55aa08971421f3a3b22ea6cd44711aa681f808b0)](https://scrutinizer-ci.com/g/ron-the-cat/code-competition/)

Code beauty contest
===================

XIAG is running the first Code Beauty Contest to encourage a good coding style.


Rules
=====

- A participant must have a [GitHub](https://github.com) account
- Forking this repository declares the contest participation
- Your code must pass `./acceptance_test.php`; please replace the `doTest()` function to invoke your
  own implementation
- Test coverage is calculated by [PHPUnit](http://www.phpunit.de); the tests must reside in `./test`
- The solutions' _beauty_ is rated based on an open voting, and on the formal metrics provided by
  [Scrutinizer](https://scrutinizer-ci.com/g/Magomogo/code-competition/) -- the participants have to
  enable their repositories at [scrutinizer-ci](https://scrutinizer-ci.com/), and update the metrics
  links in this document
- Any GitHub users can vote by starring the participant's repository

Installation
============

    composer install --dev
    ./acceptance_test.php
    ./phpunit

Problem
=======

Implement a rows list pagination navigator

## Input:

- `$offset` index of the first displayed row
- `$total` total amount of rows in the list
- `$rowsPerPage` maximum page size
- `$maxNavigatorSize` how many page numbers the navigator should display

## Output:

A string of text with page numbers, where the current page is wrapped into square brackets:

    3 4 [5] 6 7

Voting
======

After the problem is solved, the participant makes a pull request. The solutions are accessible for
voting in the [pull requests list](https://github.com/Magomogo/code-competition/pulls).
