<?php

namespace App\Infrastructure\Assembler;

use App\Presentation\Dto\CreateFinancasPostDto;
use App\Presentation\Resolver\AuthServiceResolver;

class AuthServiceAssembler
{


    public function assemblerTokenPost(string $code): CreateFinancasPostDto
    {
        $authServiceVO = new AuthServiceVO();


    }
}