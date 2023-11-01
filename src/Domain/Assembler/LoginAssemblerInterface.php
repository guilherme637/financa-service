<?php

namespace App\Domain\Assembler;
interface LoginAssemblerInterface
{
    public function assemblerLogin(string $state): string;
}