<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Adapter\Persistence\AbstractRepository;
use App\Domain\Adapter\Persistence\ContaRepositoryInterface;
use App\Domain\Entity\Conta;

class ContaRepository extends AbstractRepository implements ContaRepositoryInterface
{
    public function entity(): string
    {
        return Conta::class;
    }}