<?php

namespace App\Infrastructure\Assembler;

use App\Domain\Assembler\LoginAssemblerInterface;
use App\Infrastructure\Build\BuilderLogin;
use App\Presentation\VO\AuthServiceVO;

class LoginAssembler implements LoginAssemblerInterface
{
    public function assemblerLogin(string $state): string
    {
        return (new BuilderLogin())->build(new AuthServiceVO(), $state);
    }
}