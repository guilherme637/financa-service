<?php

namespace App\Infrastructure\Service;

use App\Domain\Adapter\Persistence\ContaRepositoryInterface;
use App\Presentation\Dto\ContaDto;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class ContaService
{
    private readonly UserInterface $user;

    public function __construct(
        private readonly ContaRepositoryInterface $contaRepository,
        private readonly CategoriaService $categoriaService,
        TokenStorageInterface $tokenStorage
    ) {
        $this->user = $tokenStorage->getToken()->getUser();
    }

    public function createFinanca(ContaDto $contaDto): void
    {
        $conta = $contaDto->toEntity();

        $conta->setUsuario($this->user->getId());
        $conta->setCategoria($this->categoriaService->findCategoria($contaDto->getCategoria()->getId()));

        $this->contaRepository->save($conta);
    }

    public function listAllContas()
    {
        return $this->contaRepository->listAll($this->user->getId());
    }
}