<?php

namespace App\Controller\Auth;

use App\Domain\Adapter\Redis\RedisAdapterInterface;
use App\Domain\Adapter\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Zuske\AuthClient\Security\Usuario;
use Zuske\AuthClient\Service\Auth\AuthClientServiceInterface;

class RedirectGetAction
{
    public function __construct(
        private readonly AuthClientServiceInterface $authService,
        private readonly RedisAdapterInterface $redisAdapter,
        private readonly SerializerInterface $serializer
    ) {}

    #[Route('/', methods: ['GET'])]
    public function __invoke(Request $request)
    {
        $code = $request->get('code');

        if (!$code) {
            return new JsonResponse('');
        }

        $tokenVO = $this->authService->makeAuthentication($request->get('code'), 'apache2_auth_service:80');

        $this->redisAdapter->setExpKey(
            $tokenVO->getToken(),
            7200,
            $this->serializer->serialize((array) $tokenVO->getTokenDecript()->sub, 'json')
        );

        return new JsonResponse($tokenVO->getToken());
    }
}