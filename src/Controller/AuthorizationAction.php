<?php

namespace App\Controller;

use App\Domain\Adapter\Serializer\SerializerInterface;
use App\Domain\Adapter\Validator\ValidatorAdapterInterface;
use App\Domain\VO\AuthorizationVO;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AuthorizationAction
{
    public function __construct(private SerializerInterface $serializer, private ValidatorAdapterInterface $adapter)
    {
    }

    #[Route(
        path: '/authorization',
        requirements: [
            'response_type' => '\d+',
            'client_id' => '\s+',
            'redirect_id' => '\s+',
            'scope' => '\s+',
            'state' => '\s+',
        ]
    )]
    public function __invoke(Request $request)
    {
        $authorization = $this->serializer->deserialize($request->getContent(), AuthorizationVO::class, 'json');
        $this->adapter->validate($authorization);
    }
}