<?php

namespace App\Infrastructure\Client;

use App\Presentation\Dto\CreateFinancasPostDto;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

class ClientService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'apache2_auth_service:80',
            RequestOptions::VERIFY => false,
            RequestOptions::TIMEOUT => 15
        ]);
    }

    public function makePullToken(array $tokenRequestDto): ResponseInterface
    {
        return $this->client->post(
            '/token',
            [
                RequestOptions::FORM_PARAMS => $tokenRequestDto
            ]
        );
    }
}