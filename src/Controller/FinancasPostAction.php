<?php

namespace App\Controller;

use App\Domain\Adapter\Serializer\SerializerInterface;
use App\Domain\Entity\Conta;
use App\Infrastructure\Persistence\ContaRepository;
use App\Infrastructure\Service\FinancasService;
use App\Presentation\Dto\ContaDto;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class FinancasPostAction
{
    public function __construct(
        private readonly TokenStorageInterface $tokenStorage,
        private readonly FinancasService $financasService,
    ) {
    }

    #[Route(path: 'v1/financas', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        $contaDto = ContaDto::fromArray(json_decode($request->getContent(), true));
        $contaDto->validate();
        $this->financasService->createFinanca($contaDto, $this->tokenStorage->getToken()->getUser());

        return new JsonResponse([''], JsonResponse::HTTP_CREATED);
    }
}