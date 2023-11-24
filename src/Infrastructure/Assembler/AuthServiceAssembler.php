<?php

namespace App\Infrastructure\Assembler;

use App\Presentation\Dto\TokenRequestDto;
use App\Presentation\Resolver\AuthServiceResolver;

class AuthServiceAssembler
{


    public function assemblerTokenPost(string $code): TokenRequestDto
    {
        $authServiceVO = new AuthServiceVO();


    }
}