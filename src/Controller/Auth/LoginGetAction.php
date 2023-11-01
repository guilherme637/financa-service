<?php

namespace App\Controller\Auth;

use App\Domain\Assembler\LoginAssemblerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class LoginGetAction
{
    public function __construct(
        private readonly LoginAssemblerInterface $authService,
        private readonly SessionInterface $session
    ) {
    }

    #[Route('/login', methods: ['GET'])]
    public function __invoke(Request $request): RedirectResponse
    {
        $state = md5(rand(1, 1000));
        $this->session->set('state', $state);
        $this->session->set('refer_', $request->getPathInfo());

        return new RedirectResponse($this->authService->assemblerLogin($state));
    }
}