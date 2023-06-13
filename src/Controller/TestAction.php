<?php

namespace App\Controller;

use JMS\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestAction
{
    /**
     * @OA\Get(
     *     path="/teste",
     *     @OA\Response(response="200")
     * )
     */
    #[Route(path: '/teste')]
    public function __invoke(SerializerInterface $e)
    {
        return new JsonResponse('hello word');
    }
}