<?php

namespace App\Infrastructure\Service;

use App\Domain\Adapter\Persistence\CategoriaRepositoryInterface;
use App\Domain\Entity\Categoria;

class CategoriaService
{
    public function __construct(private readonly CategoriaRepositoryInterface $categoriaRepository)
    {
    }

    public function findCategoria(int $id): ?Categoria
    {
        return $this->categoriaRepository->getCategoria($id);
    }
}