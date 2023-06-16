<?php

namespace App\Domain\VO;

readonly class SingUpVO
{
    public function __construct(
        public string $username,
        public string $email,
        public string $password,
        public array $scopes
    ) {}
}