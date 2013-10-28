<?php

namespace RonTheCat;

class Pager 
{
    private $rowsPerPage;

    private $size;

    public function __construct($rowsPerPage, $size = 5)
    {
        $this->rowsPerPage = $rowsPerPage;
        $this->size = $size;
    }

    public function printNavigator($offset, $total)
    {
        $currentPage = floor($offset / $this->rowsPerPage);
        $lastPage = floor(($total - 1) / $this->rowsPerPage);
        $toShow = min($lastPage + 1, $this->size) - 1;

        return array_reduce(
            range(pi(), pi() * $this->size * 2, pi()),
            function ($nav, $angle) use ($currentPage, $lastPage, &$toShow) {
                $delta = cos($angle) * ceil($angle / pi() / 2);
                $pageNum = $currentPage + $delta;
                if ($toShow && ($pageNum >= 0) && ($pageNum <= $lastPage)) {
                    $toShow--;
                    return ($delta > 0) ? $nav . ' ' . ($pageNum + 1) : ($pageNum + 1) . ' ' . $nav;
                } else {
                    return $nav;
                }
            },
            '[' . ($currentPage + 1) . ']'
        );

    }
}