This solution's metrics

[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/Magomogo/code-competition/badges/quality-score.png?s=425109351a8488b0b72903e0132a4cd07fb39c5f)](https://scrutinizer-ci.com/g/Magomogo/code-competition/) [![Code Coverage](https://scrutinizer-ci.com/g/Magomogo/code-competition/badges/coverage.png?s=2202d932963da16b3956425579078cc8356e148d)](https://scrutinizer-ci.com/g/Magomogo/code-competition/)

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

Необходимо написать разбиватель списка на страницы. Входные параметры:


- $offset, номер первой показываемой строки
- $total, общее количество строк
- $rowsPerPage, количество строк на страницу
- $maxNavigatorSize, количество номеров страниц, которые нужно показать

Результатом должна быть текстовая строка с номерами страниц, и выделенной текущей страницей:

    3 4 [5] 6 7

Голосование
===========

После того, как участник выполнит задание, он должен вернуть pull request. Список решенных заданий доступен
для голосования в списке пулл реквестов: https://github.com/Magomogo/code-competition/pulls
