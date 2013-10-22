<?php

class Navigator
{
    protected $perPage;
    protected $offset;
    protected $total;
    protected $currentPage = 1;

    public function __construct($perPage = 10)
    {
        $this->perPage = $perPage;
        $this->offset = 0;
        $this->total = 0;
    }

    public function __toString()
    {
        $currentPage = floor($this->offset / $this->perPage) + 1;
        $totalPages = ceil($this->total / $this->perPage);

        if($totalPages == 0) $totalPages++;
        $startPage = max($currentPage - 2, 1);
        $endPage = min($currentPage + 2, $totalPages);


        if($currentPage < 3)
        {
            $endExcess = -(($currentPage-1) - 2);
            $endPage = min($endPage + $endExcess, $totalPages);
        }
        if($currentPage > $totalPages - 2)
        {
            $startExcess = 2 - ($totalPages - $currentPage);
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