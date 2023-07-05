<?php

namespace App\Domain\Entity;

class Scope
{
    private int $id;
    private string $scope;

    public function getId(): int
    {
        return $this->id;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function setScope(string $scope): void
    {
        $this->scope = $scope;
    }
}