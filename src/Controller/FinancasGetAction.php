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
            'valor' => 60.20,
            'mes_divida' => '2023-06-11',
            'situacao' => 'em divida',
            'categoria' => 2,
            'parcela' => [
                'total' => 10,
                'total_pago' => 2,
                'meses_pagos' => [
                    '2023-07-08',
                    '2023-07-08'
                ]
            ]
        ]);
    }
}