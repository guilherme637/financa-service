<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class AuthorizationService
{
    private int $id;
    private string $clientId;
    private string $secret;
    private string $redirectUri;
    private ArrayCollection $scopes;

    public function __construct()
    {
        $this->scopes = new ArrayCollection();
    }

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

    public function getScopes(): ArrayCollection
    {
        return $this->scopes;
    }

    public function setScopes(Scope $scopes): void
    {
        $this->scopes->add($scopes);
    }
}