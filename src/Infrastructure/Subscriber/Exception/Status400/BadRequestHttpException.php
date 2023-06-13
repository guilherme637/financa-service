<?php

namespace App\Infrastructure\Subscriber\Exception\Status400;

use App\Domain\Enum\CodeEnum;
use App\Infrastructure\Subscriber\Exception\AbstractException;

class BadRequestHttpException extends AbstractException
{
    protected function message(): string
    {
        return 'Request invalid. Check your form';
    }

    protected function code(): int
    {
        return CodeEnum::BAD_REQUEST->value;
    }
}