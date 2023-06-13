<?php

namespace App\Infrastructure\Subscriber\Exception\Status400;

use App\Domain\Enum\CodeEnum;
use App\Infrastructure\Subscriber\Exception\AbstractException;

class NotAuthorizationHttpException extends AbstractException
{
    protected function message(): string
    {
        return 'Not Authorization';
    }

    protected function code(): int
    {
        return CodeEnum::NOT_AUTHORIZATION->value;
    }
}