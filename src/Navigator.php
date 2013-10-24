<?php

class Navigator
{
    protected $perPage;
    protected $offset;
    protected $total;
    protected $currentPage = 1;

    private $maxNavigatorSize;

    public function __construct($perPage = 10, $maxNavigatorSize = 5)
    {
        $this->perPage = $perPage;
        $this->maxNavigatorSize = $maxNavigatorSize;
        $this->offset = 0;
        $this->total = 0;
    }

    public function __toString()
    {
        $currentPage = floor($this->offset / $this->perPage) + 1;
        $totalPages = ceil($this->total / $this->perPage);
        if($totalPages == 0) $totalPages++;
        $startPage = $currentPage - floor($this->maxNavigatorSize/2);
        if ($startPage < 1) $startPage = 1;
        $endPage = $currentPage + floor($this->maxNavigatorSize/2);
        if ($endPage > $totalPages) $endPage = $totalPages;
        if($currentPage < floor($this->maxNavigatorSize/2) + 1) {
            $endExcess = -(($currentPage-1) - floor($this->maxNavigatorSize/2));
            $endPage = $endPage + $endExcess;

            if ($endPage > $totalPages) {
                $endPage = $totalPages;
            }

        }

        if($currentPage > $totalPages - floor($this->maxNavigatorSize/2)) {
            $startExcess = floor($this->maxNavigatorSize/2) - ($totalPages - $currentPage);
            $startPage = $startPage - $startExcess;

            if ($startPage < 1) {
                $startPage = 1;
            }
        }

        $paginator = '';

        for($i = $startPage; $i <= $endPage; $i++)
        {
            if($i == $currentPage) $paginator .= "[$i] ";
            else $paginator .= $i . ' ';
        }

        if (substr($paginator, strlen($paginator) - 1 , 1) == ' ') {
            $paginator = substr($paginator, 0, strlen($paginator) - 1 );
        }

        return $paginator;

    }

    public function accept($data)
    {
        $this->total = $data['total_rows'];
        $this->offset = $data['offset'];

        return $this;
    }

}