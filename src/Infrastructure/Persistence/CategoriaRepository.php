<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Adapter\Persistence\AbstractRepository;
use App\Domain\Adapter\Persistence\CategoriaRepositoryInterface;
use App\Domain\Entity\Categoria;

class CategoriaRepository extends AbstractRepository implements CategoriaRepositoryInterface
{
    public function entity(): string
    {
        return Categoria::class;
    }

    public function getCategoria(int $id): ?Categoria
    {
        return $this->find($id);
    }
}