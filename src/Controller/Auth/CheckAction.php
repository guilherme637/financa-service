<?php

namespace App\Controller\Auth;

use App\Domain\Adapter\Redis\RedisAdapterInterface;
use App\Domain\Adapter\Serializer\SerializerInterface;
use App\Domain\Entity\Usuario;
use App\Infrastructure\Assembler\AuthServiceAssembler;
use App\Infrastructure\Client\ClientAuthService;
use Auth\Token;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CheckAction
{
    public function __construct(
        private readonly RedisAdapterInterface $redisAdapter,
        private readonly ClientAuthService $clientAuthService,
        private readonly SerializerInterface $serializer
    ){
    }

    #[Route('/check')]
    public function __invoke(Request $request)
    {
        if ($request->get('state') !== $request->getSession()->get('state')) {
            throw new \Exception('Unauthorized', 401);
        }

        $tokenRequestDto = (new AuthServiceAssembler())->assemblerTokenPost($request->get('code'));
        $tokenRequest = $this->serializer->toArray($tokenRequestDto);


        try {
            $token = $this->clientAuthService->makePullToken($tokenRequest);
        } catch (\Throwable $exception) {
            if (in_array($exception->getCode(), [400, 500])) {
                return new RedirectResponse('/login');
            }
        }

        $userToken = Token::decrypt(json_decode($token->getBody()->getContents(), true)['access_token'], 'financas')->sub;
        $user = $this->serializer->serialize((array) $userToken, 'json');
        $this->redisAdapter->setExpKey($userToken->email, 7200, $user);

        return new RedirectResponse('/');
    }
}