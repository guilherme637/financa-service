<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Adapter\Persistence\AbstractRepository;
use App\Domain\Adapter\Persistence\PerfilRepositoryInterface;
use App\Domain\Entity\Perfil;

class PerfilRepository extends AbstractRepository implements PerfilRepositoryInterface
{
    protected function entity(): string
    {
        return Perfil::class;
    }

    public function findPerfil(int $id): ?Perfil
    {
        return $this->find($id);
    }
}