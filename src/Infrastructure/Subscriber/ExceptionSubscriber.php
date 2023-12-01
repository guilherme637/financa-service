<?php

namespace App\Infrastructure\Subscriber;

use Firebase\JWT\ExpiredException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Zuske\AuthClient\Exception\MakeLoginAgainException;

class ExceptionSubscriber implements EventSubscriberInterface
{
    public function __construct(private readonly RouterInterface $router)
    {
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => [
                ['onException', 100]
            ]
        ];
    }

    public function onException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();

        if (
            $exception instanceof ExpiredException
            || $exception instanceof AccessDeniedException
            || $exception instanceof MakeLoginAgainException
        ) {
            $event->setResponse(
                new RedirectResponse($this->router->generate('route_login'))
            );
            return;
        }

        dump($exception);
        exit();
//        $event->setResponse(
//            new JsonResponse(
//                $responseVO->getResponse(),
//                $responseVO->getCode()
//            )
//        );
    }
}