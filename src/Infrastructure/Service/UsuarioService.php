<?php

namespace App\Infrastructure\Service;

use App\Domain\Adapter\Serializer\SerializerInterface;
use App\Domain\Entity\Usuario;

class UsuarioService
{
    public function __construct(
        private SerializerInterface $serializer,
        private PerfilService $perfilService,
    ) {
    }

    public function deserializeUsuario(string $json): Usuario
    {
        /** @var Usuario $usuario */
        $usuario = $this->serializer->deserialize($json, Usuario::class, 'json');

        $usuario->setPerfil($this->perfilService->find($usuario->getId()));

        return $usuario;
    }
}