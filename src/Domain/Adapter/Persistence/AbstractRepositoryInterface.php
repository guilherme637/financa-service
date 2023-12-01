<?php

namespace App\Domain\Adapter\Persistence;

interface AbstractRepositoryInterface
{
    public function save(object $entity): void;
}