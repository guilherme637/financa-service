<?php

namespace App\Domain\VO;

readonly class AuthorizeVO
{
    public function __construct(
        public string $responseType,
        public string $clientId,
        public string $redirectId,
        public string $scope,
        public string $state,
        public string $email,
        public string $password,
    ) {}
}