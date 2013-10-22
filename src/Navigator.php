<?php

class Navigator
{
    protected $perPage;
    protected $offset;
    protected $total;
    protected $currentPage = 1;

    private $pagesCount;

    public function __construct($perPage = 10, $pagesCount = 5)
    {
        $this->perPage = $perPage;
        $this->pagesCount = $pagesCount;
        $this->offset = 0;
        $this->total = 0;
    }

    public function __toString()
    {
        $currentPage = floor($this->offset / $this->perPage) + 1;
        $totalPages = ceil($this->total / $this->perPage);

        if($totalPages == 0) $totalPages++;
        $startPage = max($currentPage - floor($this->pagesCount/2), 1);
        $endPage = min($currentPage + floor($this->pagesCount/2), $totalPages);

        if($currentPage < floor($this->pagesCount/2) + 1)
        {
            $endExcess = -(($currentPage-1) - floor($this->pagesCount/2));
            $endPage = min($endPage + $endExcess, $totalPages);
        }
        if($currentPage > $totalPages - floor($this->pagesCount/2))
        {
            $startExcess = floor($this->pagesCount/2) - ($totalPages - $currentPage);
            $startPage = max($startPage - $startExcess, 1);
        }

        $paginator = array();

        for($i = $startPage; $i <= $endPage; $i++)
        {
            if($i == $currentPage) $paginator[] = "[$i]";
            else $paginator[] = $i;
        }

        return implode(' ', $paginator);

    }

    public function accept($data)
    {
        $this->total = $data['total_rows'];
        $this->offset = $data['offset'];

        return $this;
    }

}