<?php

namespace App\Domain\Adapter\Persistence;

use App\Domain\Entity\Perfil;

interface PerfilRepositoryInterface extends AbstractRepositoryInterface
{
    public function findPerfil(int $id): ?Perfil;
}