<?php

namespace App\Infrastructure\Subscriber\Exception\Resolver;

use App\Domain\VO\ResponseVO;

interface ResolverHandlerInterface
{
    public function setNext(ResolverHandlerInterface $handler): ResolverHandlerInterface;
    public function handle(\Throwable $throwable): ?ResponseVO;
}