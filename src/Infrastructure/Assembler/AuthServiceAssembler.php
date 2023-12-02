<?php

namespace App\Infrastructure\Assembler;

use App\Presentation\Dto\ContaDto;
use App\Presentation\Resolver\AuthServiceResolver;

class AuthServiceAssembler
{


    public function assemblerTokenPost(string $code): ContaDto
    {
        $authServiceVO = new AuthServiceVO();


    }
}