<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CheckAction
{
    #[Route('/check')]
    public function __invoke(Request $request)
    {
        dump($request);
        exit();
    }
}