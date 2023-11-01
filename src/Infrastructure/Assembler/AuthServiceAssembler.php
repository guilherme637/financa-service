<?php

namespace App\Infrastructure\Assembler;

use App\Presentation\Dto\TokenRequestDto;
use App\Presentation\VO\AuthServiceVO;

class AuthServiceAssembler
{
    public function assemblerTokenPost(string $code): TokenRequestDto
    {
        $authServiceVO = new AuthServiceVO();

        return new TokenRequestDto(
            $authServiceVO->getGranType(),
            $authServiceVO->getClientId(),
            $code,
            $authServiceVO->getClientSecret(),
            $authServiceVO->getRedirectUri()
        );
    }
}