<?php

namespace App\Domain\Builder;

use App\Domain\Entity\MesesPagos;
use App\Domain\Entity\Parcela;

interface MesesPagosBuilderInterface
{
    public function build(string $date, Parcela $parcela): MesesPagos;
}