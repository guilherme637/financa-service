<?php

namespace App\Controller;

use App\Domain\Adapter\Serializer\SerializerInterface;
use App\Infrastructure\Service\FinancasService;
use App\Presentation\Dto\CreateFinancasPostDto;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class FinancasPostAction
{
    public function __construct(
        private readonly TokenStorageInterface $tokenStorage,
        private readonly SerializerInterface $serializer,
        private readonly FinancasService $financasService
    ) {
    }

    #[Route(path: 'v1/financas', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        $financaDto = $this->serializer->deserialize($request->getContent(), CreateFinancasPostDto::class, 'json');
        $this->financasService->createFinanca($financaDto, $this->tokenStorage->getToken()->getUser());
    }
}