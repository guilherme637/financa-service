<?php

namespace App\Controller\Auth;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Zuske\AuthClient\Service\Auth\AuthClientServiceInterface;

class LoginGetAction
{
    public function __construct(private readonly AuthClientServiceInterface $authService) {}

    #[Route('/login', methods: ['GET'])]
    public function __invoke(Request $request): RedirectResponse
    {
        if ($request->getPathInfo() === '/login') {
            $path = '/';
        }

        return new RedirectResponse(
            $this->authService->makeLogin(
                isset($path) ? $path: $request->getPathInfo(),
                $request->getSession()
            )
        );
    }
}