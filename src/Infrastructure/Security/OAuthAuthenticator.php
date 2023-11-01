<?php

namespace App\Infrastructure\Security;

use App\Domain\Adapter\Redis\RedisAdapterInterface;
use App\Domain\Adapter\Serializer\SerializerInterface;
use App\Domain\Entity\Usuario;
use App\Infrastructure\Subscriber\Exception\Status400\NotAuthorizationHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\CustomCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;

class OAuthAuthenticator extends AbstractAuthenticator
{
    public function __construct(
        private readonly RedisAdapterInterface $redisAdapter,
        private readonly SerializerInterface $serializer
    ) {}

    public function supports(Request $request): ?bool
    {
        return true;

        return $request->headers->has('auth-token');
    }

    public function authenticate(Request $request)
    {
//        $authToken = base64_decode($request->headers->get('auth-token'));
        $authToken = base64_decode('dGVzdGVAdGVzdGUuY29t');
        $token = $this->redisAdapter->get($authToken);

        if (null === $token) {
            // The token header was empty, authentication fails with HTTP Status
            // Code 401 "Unauthorized"
            throw new NotAuthorizationHttpException('Unauthorized');
        }

        /** @var Usuario $user */

        return new Passport(
            new UserBadge($token, function (string $email) {
                return $this->serializer->deserialize($email, Usuario::class, 'json');
            }),
            new CustomCredentials(
                function (string $credentials, Usuario $user): bool {
                    return $credentials === $user->getEmail();
                },
                $authToken
            )
        );

    }


    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // on success, let the request continue
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $data = [
            // you may want to customize or obfuscate the message first
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData())

            // or to translate this message
            // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }
}