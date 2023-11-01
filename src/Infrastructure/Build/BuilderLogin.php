<?php

namespace App\Infrastructure\Build;

use App\Presentation\VO\AuthServiceVO;

class BuilderLogin
{
    private const QUERY = '/login?response_type=%s&client_id=%s&redirect_uri=%s&scope=%s&state=%s';

    public function build(AuthServiceVO $loginRequest, string $state): string
    {
        return $loginRequest->getHost()
            . sprintf(
                self::QUERY,
                $loginRequest->getResponseType(),
                $loginRequest->getClientId(),
                $loginRequest->getRedirectUri(),
                $loginRequest->getScope(),
                $state
            );
    }
}