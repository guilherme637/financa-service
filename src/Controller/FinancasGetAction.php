<?php

namespace App\Controller;

use App\Infrastructure\Service\ContaService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class FinancasGetAction
{
    public function __construct(private readonly ContaService $contaService)
    {
    }

    #[Route(path: '/v1/financas', methods: ['GET'])]
    public function __invoke(TokenStorageInterface $storage)
    {
        return new JsonResponse($this->contaService->listAllContas(), JsonResponse::HTTP_OK, [], true);
    }
}