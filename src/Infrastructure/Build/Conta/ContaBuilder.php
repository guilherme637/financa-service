<?php

namespace App\Infrastructure\Build\Conta;

use App\Domain\Builder\ContaBuilderInterface;
use App\Domain\Entity\Categoria;
use App\Domain\Entity\Conta;
use App\Domain\Entity\Usuario;
use App\Infrastructure\Build\Parcela\ParcelaBuilder;
use App\Presentation\Dto\CreateFinancasPostDto;

class ContaBuilder implements ContaBuilderInterface
{
    public function build(
        CreateFinancasPostDto $createFinancasPostDto,
        Categoria $categoria,
        Usuario $usuario
    ): Conta {
        $conta = new Conta();

        $conta->setValor($createFinancasPostDto->getValor());
        $conta->setMesDivida(new \DateTime($createFinancasPostDto->getMesDivida()));
        $conta->setCategoria($categoria);
        $conta->setParcela(
            (new ParcelaBuilder())->build($createFinancasPostDto->getParcela(), $conta)
        );
        $conta->setUsuario($usuario->getId());

        return $conta;
    }
}