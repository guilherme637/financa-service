<?php

namespace App\Infrastructure\Subscriber\Exception\Status500;

use App\Domain\Enum\CodeEnum;
use App\Infrastructure\Subscriber\Exception\AbstractException;

class InternalServerHttpException extends AbstractException
{
    protected function message(): string
    {
        return 'Internal Server Error.';
    }

    protected function code(): int
    {
        return CodeEnum::INTERNAL_SERVER->value;
    }
}