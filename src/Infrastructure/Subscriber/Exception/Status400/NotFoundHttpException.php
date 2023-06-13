<?php

namespace App\Infrastructure\Subscriber\Exception\Status400;

use App\Domain\Enum\CodeEnum;
use App\Infrastructure\Subscriber\Exception\AbstractException;

class NotFoundHttpException extends AbstractException
{
    protected function message(): string
    {
        return '';
    }

    protected function code(): int
    {
        return CodeEnum::NOT_FOUND->value;
    }
}