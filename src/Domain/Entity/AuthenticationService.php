<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class AuthenticationService
{
    private int $id;
    private string $clientId;
    private string $secret;
    private string $redirectUri;
    private int $scopes;


    public function getId(): int
    {
        return $this->id;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }

    public function getSecret(): string
    {
        return $this->secret;
    }

    public function setSecret(string $secret): void
    {
        $this->secret = $secret;
    }

    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }

    public function setRedirectUri(string $redirectUri): void
    {
        $this->redirectUri = $redirectUri;
    }

    public function getScopes(): int
    {
        return $this->scopes;
    }

    public function setScopes(int $scopes): void
    {
        $this->scopes = $scopes;
    }
}