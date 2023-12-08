<?php

namespace App\Domain\Adapter\Persistence;

interface ContaRepositoryInterface extends AbstractRepositoryInterface
{
    public function listAll(int $perfilId): array;
}