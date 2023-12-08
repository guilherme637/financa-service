<?php

namespace App\Infrastructure\Service;

use App\Domain\Adapter\Persistence\PerfilRepositoryInterface;
use App\Domain\Entity\Perfil;

class PerfilService
{
    public function __construct(private PerfilRepositoryInterface $perfilRepository)
    {
    }

    public function find(int $id): ?Perfil
    {
        return $this->perfilRepository->findPerfil($id);
    }
}