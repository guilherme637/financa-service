<?php

namespace App\Controller\Auth;

use App\Domain\Adapter\Redis\RedisAdapterInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RedirectGetAction
{
    public function __construct(private readonly RedisAdapterInterface $redisAdapter) {}

    #[Route('/', methods: ['GET'])]
    public function __invoke(Request $request)
    {
        $hasToken = $this->redisAdapter->get($request->getSession()->get('state'));

        if (empty($hasToken)) {
            $request->getSession()->clear();
        }

        $code = $hasToken
            ? ['code' => $request->get('code')]
            : ['links' => 'http://www.financa-service.com.br:3030/login'];

        return new JsonResponse($code);
    }
}