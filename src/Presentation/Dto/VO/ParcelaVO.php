<?php

namespace App\Presentation\Dto\VO;

use Doctrine\Common\Collections\ArrayCollection;

class ParcelaVO
{
    public function __construct(
        private int $total,
        private int $totalPago,
        private ArrayCollection $mesesPagos
    ) {
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getTotalPago(): int
    {
        return $this->totalPago;
    }

    public function getMesesPagos(): ArrayCollection
    {
        return $this->mesesPagos;
    }
}