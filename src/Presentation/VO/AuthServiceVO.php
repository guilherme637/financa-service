<?php

namespace App\Presentation\VO;

readonly class AuthServiceVO
{
    public function getHost(): string
    {
        return 'http://auth-service.com.br:3031';
    }

    public function getResponseType(): string
    {
        return 'code';
    }

    public function getGranType(): string
    {
        return 'authorization_code';
    }

    public function getClientId(): string
    {
        return 'e29bd183f7d5f19a3e74ac7abaf855323926ccb3f3fc5e02336ad5ed59aa774f5f397f13a498db4d51f1cb4ed62c2dc46e0ebc82162d64801ad8edb681d4710f';
    }

    public function getClientSecret(): string
    {
        return 'f0fd856f850f0ddefcf3e200317612748fdba4fca187f58ef0d531035dd32c7f08d831fef3583b5a034065fdac73d03f3470370f2d6c2c6bdaa62fecf5b2ce73';
    }

    public function getScope(): string
    {
        return 'w r';
    }

    public function getRedirectUri(): string
    {
        return 'http://www.financa-service.com.br:3030/check';
    }
}