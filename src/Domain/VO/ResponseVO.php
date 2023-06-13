<?php

namespace App\Domain\VO;

class ResponseVO
{
    private array $response;

    public function __construct(\Throwable $throwable)
    {
        $this->response = [
            'message' => $throwable->getMessage(),
            'code' => $throwable->getCode()
        ];
    }

    public function getMessage(): string
    {
        return $this->response['message'];
    }

    public function getCode(): int
    {
        return $this->response['code'];
    }

    public function getResponse(): array
    {
        return $this->response;
    }
}