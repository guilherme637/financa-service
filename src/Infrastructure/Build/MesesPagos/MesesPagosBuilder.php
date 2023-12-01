<?php

namespace App\Infrastructure\Build\MesesPagos;

use App\Domain\Builder\MesesPagosBuilderInterface;
use App\Domain\Entity\MesesPagos;
use App\Domain\Entity\Parcela;

class MesesPagosBuilder implements MesesPagosBuilderInterface
{
    public function build(string $date, Parcela $parcela): MesesPagos
    {
        $meses = new MesesPagos();

        $meses->setDtPagamento(new \DateTime($date));
        $meses->setParcela($parcela);

        return $meses;
    }
}