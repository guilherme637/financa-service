<?php

namespace App\Infrastructure\Subscriber\Exception\Resolver;

use App\Domain\VO\ResponseVO;
use App\Infrastructure\Subscriber\Exception\Resolver\Handler\BadRequestHandler;
use App\Infrastructure\Subscriber\Exception\Resolver\Handler\CustomExceptionHandler;
use App\Infrastructure\Subscriber\Exception\Resolver\Handler\NotAuthorizationHandler;
use App\Infrastructure\Subscriber\Exception\Resolver\Handler\NotFoundHandler;

class Resolver
{
    public function resolver(\Throwable $throwable): ResponseVO
    {
        $response = new BadRequestHandler();
        $response->setNext(new NotFoundHandler())
            ->setNext(new NotAuthorizationHandler())
            ->setNext(new CustomExceptionHandler());

        return $response->handle($throwable);
    }
}