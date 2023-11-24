<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class FinancasGetAction
{
    #[Route(path: '/financas/list')]
    public function __invoke(TokenStorageInterface $storage)
    {
        return new JsonResponse([
            'conta' => 'Camisa Corinthians',
            'valor' => 299.99,
            'mes_divida' => new \DateTime('2023-03-15'),
            'situacao' => 'Pago',
            'categoria' => 'Outros',
            'parcela' => '2/10',
        ]);
    }
}