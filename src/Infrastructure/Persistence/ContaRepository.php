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
    }

    public function listAll(int $usuario): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.usuario = :nu_seq_usuario')
            ->setParameter('nu_seq_usuario', $usuario)
            ->getQuery()
            ->getResult()
        ;
    }
}