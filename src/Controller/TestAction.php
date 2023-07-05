<?php

namespace App\Controller;

use App\Domain\Entity\AuthorizationService;
use JMS\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/teste')]
class TestAction
{
    public function __invoke(SerializerInterface $e)
    {
        $clientId = hash('sha256', '@-=teste_hash=+');
        $secret = hash('haval256,4', '@-=teste_hash=+');
        dump($clientId, $secret);
        exit();
        return new JsonResponse('hello word');
    }
}