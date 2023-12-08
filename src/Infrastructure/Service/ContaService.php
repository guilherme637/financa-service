<?php

namespace App\Infrastructure\Service;

use App\Domain\Adapter\Persistence\ContaRepositoryInterface;
use App\Domain\Adapter\Serializer\SerializerInterface;
use App\Presentation\Dto\ContaDto;
use App\Presentation\Dto\Response\ContaResponseDto;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class ContaService
{
    private readonly UserInterface $user;

    public function __construct(
        private readonly ContaRepositoryInterface $contaRepository,
        private readonly CategoriaService $categoriaService,
        private readonly SituacaoService $situacaoService,
        private readonly SerializerInterface $serializer,
        TokenStorageInterface $tokenStorage
    ) {
        $this->user = $tokenStorage->getToken()->getUser();
    }

    public function createFinanca(ContaDto $contaDto): void
    {
        $conta = $contaDto->toEntity();

        $conta->setPerfil($this->user->getPerfil());
        $conta->setCategoria($this->categoriaService->findCategoria($contaDto->getCategoria()->getId()));
        $conta->setSituacao($this->situacaoService->find($contaDto->getSituacao()->getId()));

        $this->contaRepository->save($conta);
    }

    public function listAllContas()
    {
        $contasEntity = $this->contaRepository->listAll($this->user->getPerfil()->getId());
        $contas = [];

        foreach ($contasEntity as $conta) {
            $contas[] = ContaResponseDto::fromEntity($conta);
        }

        return $this->serializer->serialize($contas, 'json');
    }
}