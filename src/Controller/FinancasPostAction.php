<?php

namespace App\Controller;

use App\Domain\Adapter\Serializer\SerializerInterface;
use App\Domain\Entity\Conta;
use App\Infrastructure\Persistence\ContaRepository;
use App\Infrastructure\Service\ContaService;
use App\Presentation\Dto\ContaDto;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class FinancasPostAction
{
    public function __construct(private readonly ContaService $financasService)
    {
    }

    #[Route(path: 'v1/financas', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        $contaDto = ContaDto::fromArray(json_decode($request->getContent(), true));

        $this->financasService->createFinanca($contaDto);

        return new JsonResponse($contaDto->toArray(), JsonResponse::HTTP_CREATED);
    }
}