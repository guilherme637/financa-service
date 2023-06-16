<?php

namespace App\Controller;

use App\Domain\Adapter\Serializer\SerializerInterface;
use App\Domain\Adapter\Validator\ValidatorAdapterInterface;
use App\Domain\Entity\User;
use App\Domain\VO\SingUpVO;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SignUpAction
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorAdapterInterface $validator,
        private EntityManagerInterface $entityManager
    )
    {
    }

    #[Route(path: '/singup', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        /** @var SingUpVO $userVO */
        $userVO = $this->serializer->deserialize($request->getContent(), SingUpVO::class, 'json');
        $this->validator->validate($userVO);

        $user = new User();
        $user->setUsername($userVO->username);
        $user->setEmail($userVO->email);
        $user->setPassword(password_hash($userVO->password, PASSWORD_ARGON2ID, ['cost' => 64]));
        $user->setScope($userVO->scopes);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return new JsonResponse('created', 201);
    }
}