<?php

namespace App\Domain\Adapter\Persistence;

use App\Domain\Entity\Categoria;

interface CategoriaRepositoryInterface extends AbstractRepositoryInterface
{
    public function getCategoria(int $id): ?Categoria;
}