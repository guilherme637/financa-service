<?php

namespace App\Infrastructure\Subscriber\Exception\Status200;

use App\Domain\Enum\CodeEnum;
use App\Infrastructure\Subscriber\Exception\AbstractException;

class NoContentHttpException extends AbstractException
{
    protected function message(): string
    {
        return '';
    }

    protected function code(): int
    {
        return CodeEnum::NO_CONTENT->value;
    }
}