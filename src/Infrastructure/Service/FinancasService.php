<?php

namespace App\Infrastructure\Service;

use App\Domain\Adapter\Persistence\ContaRepositoryInterface;
use App\Domain\Entity\Usuario;
use App\Presentation\Dto\ContaDto;

class FinancasService
{
    public function __construct(
        private readonly ContaRepositoryInterface $contaRepository,
        private readonly CategoriaService $categoriaService
    ) {
    }

    public function createFinanca(ContaDto $contaDto, Usuario $usuario)
    {
        $conta = $contaDto->toEntity();
        $conta->setUsuario($usuario->getId());

        $this->contaRepository->save($conta);
    }
}