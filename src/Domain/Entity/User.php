<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class User
{
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private ?array $scope;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getScope(): array
    {
        return $this->scope;
    }

    public function setScope(array $scope): void
    {
        $this->scope = ($scope);
    }
}