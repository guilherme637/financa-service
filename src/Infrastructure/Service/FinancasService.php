<?php

namespace App\Infrastructure\Service;

use App\Domain\Adapter\Persistence\ContaRepositoryInterface;
use App\Domain\Entity\Usuario;
use App\Infrastructure\Build\Conta\ContaBuilder;
use App\Presentation\Dto\CreateFinancasPostDto;

class FinancasService
{
    public function __construct(
        private readonly ContaRepositoryInterface $contaRepository,
        private readonly CategoriaService $categoriaService
    ) {
    }

    public function createFinanca(CreateFinancasPostDto $createFinancasPostDto, Usuario $usuario)
    {
        $conta = (new ContaBuilder())->build(
            $createFinancasPostDto,
            $this->categoriaService->findCategoria($createFinancasPostDto->getCategoria()),
            $usuario
        );

        $this->contaRepository->save($conta);
    }
}