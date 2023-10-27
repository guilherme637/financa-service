<?php

namespace App\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Symfony\Component\Routing\Annotation\Route;

class TesteAction
{
    private Client $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'apache2_auth_service:80',
            RequestOptions::TIMEOUT => 10,
            RequestOptions::HEADERS => [
                RequestOptions::VERIFY => true,
            ],
            RequestOptions::COOKIES => true
        ]);
    }

    #[Route('/login')]
    public function __invoke()
    {
        try {
            $request = $this->client->request(
                'POST',
                '/token',
                [
                    RequestOptions::FORM_PARAMS => [
                        'grant_type' => 'authorization_code',
                        'client_id' => 'e29bd183f7d5f19a3e74ac7abaf855323926ccb3f3fc5e02336ad5ed59aa774f5f397f13a498db4d51f1cb4ed62c2dc46e0ebc82162d64801ad8edb681d4710f',
                        'code' => 'ZTE1NDFjMTIxMWZhN2ViNzk5NWY5YzI5NTAwZGJlYTc=',
                        'client_secret' => 'f0fd856f850f0ddefcf3e200317612748fdba4fca187f58ef0d531035dd32c7f08d831fef3583b5a034065fdac73d03f3470370f2d6c2c6bdaa62fecf5b2ce73',
                        'redirect_id' => 'https://financas.com.br:3030/check-token',
                    ],
                ]
            );
        } catch (ConnectException|RequestException $e) {
            dump($e);
            exit();
        }


        dump($request->getBody()->getContents());
        exit();
    }
}