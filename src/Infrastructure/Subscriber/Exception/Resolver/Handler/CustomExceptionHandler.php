<?php

namespace App\Infrastructure\Subscriber\Exception\Resolver\Handler;

use App\Infrastructure\Subscriber\Exception\Resolver\ResolverAbstract;

class CustomExceptionHandler extends ResolverAbstract
{
    public function shoudCall(\Throwable $throwable): bool
    {
        return $throwable instanceof \DomainException;
    }
}