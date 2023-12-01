<?php

namespace App\Infrastructure\Build\Parcela;

use App\Domain\Entity\Conta;
use App\Domain\Entity\Parcela;
use App\Infrastructure\Build\MesesPagos\MesesPagosBuilder;
use App\Presentation\Dto\VO\ParcelaVO;

class ParcelaBuilder
{
    public function build(ParcelaVO $parcelaVO, Conta $conta): Parcela
    {
        $parcela = new Parcela();

        $parcela->setTotal($parcelaVO->getTotal());
        $parcela->setPago($parcelaVO->getTotalPago());
        $parcela->setConta($conta);

        foreach ($parcelaVO->getMesesPagos()->toArray() as $mes) {
            $parcela->setMesesPagos(
                (new MesesPagosBuilder())->build($mes, $parcela)
            );
        }

        return $parcela;
    }
}