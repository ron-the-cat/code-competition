<?php

namespace RonTheCat;

class Pager 
{
    private $rowsPerPage;

    private $halfSize;

    public function __construct($rowsPerPage, $size = 5)
    {
        $this->rowsPerPage = $rowsPerPage;
        $this->halfSize = floor($size/2);
    }

    public function printNavigator($offset, $total)
    {
        $currentPage = ceil($offset / $this->rowsPerPage) + 1;

        return join(' ', array_map(
            function ($item) use ($currentPage) {
                return ($currentPage === $item ? "[$item]" : $item);
            },
            range($currentPage - $this->halfSize, $currentPage + $this->halfSize)
        ));
    }
}