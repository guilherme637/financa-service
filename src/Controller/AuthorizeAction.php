<?php

namespace App\Controller;

use App\Domain\Adapter\Serializer\SerializerInterface;
use App\Domain\Adapter\Validator\ValidatorAdapterInterface;
use App\Domain\Entity\AuthenticationService;
use App\Domain\Entity\Scope;
use App\Domain\Entity\User;
use App\Domain\VO\AuthorizeVO;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AuthorizeAction
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorAdapterInterface $validator,
        private EntityManagerInterface $entityManager
    ) {}

    #[Route(
        path: '/authorize',
        requirements: [
            'response_type' => '\d+',
            'client_id' => '\s+',
            'redirect_id' => '\s+',
            'scope' => '\s+',
            'state' => '\s+',
        ]
    )]
    public function __invoke(Request $request)
    {
        /** @var AuthenticationService $client */
        $client = $this->entityManager
            ->getRepository(AuthenticationService::class)
//            ->find(['clientId' => $request->get('client_id')]);
            ->findOneBy(['clientId' => $request->get('client_id')]);

        dump($client);
        exit();
        $client->setScopes($scope);
        $this->entityManager->persist($client);
        $this->entityManager->flush();
    }
}