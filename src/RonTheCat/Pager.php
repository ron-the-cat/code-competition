<?php

namespace RonTheCat;

class Pager 
{
    private $rowsPerPage;

    private $size;

    public function __construct($rowsPerPage, $size)
    {
        $this->rowsPerPage = $rowsPerPage;
        $this->size = $size;
    }

    public function printNavigator($offset, $total)
    {
        $currentPage = floor($offset / $this->rowsPerPage);
        $pagesTotal = ceil($total / $this->rowsPerPage);
        $pagesToShow = min($pagesTotal, $this->size) - 1;

        $addPage = function ($nav, $delta) use ($currentPage, $pagesTotal, &$pagesToShow) {
            $pageNum = $currentPage + $delta;
            if ($pagesToShow && ($pageNum >= 0) && ($pageNum < $pagesTotal)) {
                $pagesToShow--;
                return ($delta > 0) ? $nav . ' ' . ($pageNum + 1) : ($pageNum + 1) . ' ' . $nav;
            } else {
                return $nav;
            }
        };

        return array_reduce(
            range(pi(), pi() * $this->size * 2, pi()),
            function ($nav, $angle) use ($addPage) {
                return $addPage(
                    $nav,
                    cos($angle) * ceil($angle / pi() / 2)
                );
            },
            '[' . ($currentPage + 1) . ']'
        );

    }
}