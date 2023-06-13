<?php

namespace App\Infrastructure\Subscriber\Exception\Resolver\Handler;

use App\Infrastructure\Subscriber\Exception\Resolver\ResolverAbstract;
use App\Infrastructure\Subscriber\Exception\Status400\NotAuthorizationHttpException;

class NotAuthorizationHandler extends ResolverAbstract
{
    public function shoudCall(\Throwable $throwable): bool
    {
        return $throwable instanceof NotAuthorizationHttpException;
    }
}