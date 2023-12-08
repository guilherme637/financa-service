<?php

namespace App\Infrastructure\Build\Conta;

use App\Domain\Builder\ContaBuilderInterface;
use App\Domain\Entity\Conta;
use App\Presentation\Dto\ContaDto;

class ContaBuilder implements ContaBuilderInterface
{
    public function build(ContaDto $contaDto): Conta
    {
        $conta = new Conta();
        $parcela = $contaDto->getParcela()->toEntity();

        $conta->setDescricao($contaDto->getDescricao());
        $conta->setValor($contaDto->getValor());
        $conta->setSituacao($contaDto->getSituacao()->toEntity());
        $conta->setMesDivida($contaDto->getMesDivida());
        $conta->setCategoria($contaDto->getCategoria()->toEntity());
        $parcela->setConta($conta);

        $conta->setParcela($parcela);

        return $conta;
    }
}