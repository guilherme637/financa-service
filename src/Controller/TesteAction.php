<?php

namespace App\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class TesteAction
{
    private Client $client;
    private TokenStorageInterface $token;
    public function __construct(TokenStorageInterface $token)
    {
        $this->client = new Client([
            'base_uri' => 'apache2_auth_service:80',
            RequestOptions::TIMEOUT => 10,
            RequestOptions::HEADERS => [
                RequestOptions::VERIFY => true,
            ],
            RequestOptions::COOKIES => true
        ]);
        $this->token = $token;
    }

    #[Route('/teste')]
    public function __invoke(Request $request)
    {
//        try {
//            $redis = new \Redis();
//            $redis->connect('redis');
//            $redis->setex('timao', 60, 'Corinthians');
//
//            $request = $this->client->request(
//                'POST',
//                '/token',
//                [
//                    RequestOptions::FORM_PARAMS => [
//                        'grant_type' => 'authorization_code',
//                        'client_id' => 'e29bd183f7d5f19a3e74ac7abaf855323926ccb3f3fc5e02336ad5ed59aa774f5f397f13a498db4d51f1cb4ed62c2dc46e0ebc82162d64801ad8edb681d4710f',
//                        'code' => 'ZDQ5ODJmY2I2MTc3MTc4ZDA2NGE2ODZlYzQ3YzExYWU=',
//                        'client_secret' => 'f0fd856f850f0ddefcf3e200317612748fdba4fca187f58ef0d531035dd32c7f08d831fef3583b5a034065fdac73d03f3470370f2d6c2c6bdaa62fecf5b2ce73',
//                        'redirect_id' => 'https://financas.com.br:3030/check-token',
//                    ],
//                ]
//            );
//
//            $token = json_decode($request->getBody()->getContents(), true)['access_token'];
//
//            $jwt = Token::decrypt($token, 'financas');
//            dump($jwt->exp);
//            exit();
//        } catch (ConnectException|RequestException $e) {
//            dump($e);
//            exit();
//        }
//
//
//        dump($request->getBody()->getContents());
//        exit();
    }
}