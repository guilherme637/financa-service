<?php

namespace App\Controller\Auth;

use App\Domain\Adapter\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class MeGetAction
{
    public function __construct(
        private readonly SerializerInterface $serializer,
        private readonly TokenStorageInterface $tokenStorage
    )
    {
    }

    #[Route(path: '/me', methods: ['GET'])]
    public function __invoke()
    {
       return new JsonResponse(
           $this->serializer->serialize($this->tokenStorage->getToken()->getUser(), 'json'),
           Response::HTTP_OK,
           [],
           true
       );
    }
}