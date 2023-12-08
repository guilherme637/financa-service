<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Adapter\Persistence\AbstractRepository;
use App\Domain\Adapter\Persistence\ContaRepositoryInterface;
use App\Domain\Entity\Conta;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Statement;

class ContaRepository extends AbstractRepository implements ContaRepositoryInterface
{
    public function entity(): string
    {
        return Conta::class;
    }

//    public function listAll(int $perfilId): array
//    {
//        return $this->createQueryBuilder('conta')
//            ->innerJoin('conta.situacao', 'situacao', 'WITH', 'conta.situacao = situacao.id')
//            ->addSelect('situacao')
//            ->innerJoin('conta.categoria', 'categoria', 'WITH', 'conta.categoria = categoria.id')
//            ->addSelect('categoria')
//            ->innerJoin('conta.parcela', 'parcela', 'WITH', 'conta.id = parcela.id')
//            ->addSelect('parcela')
//            ->innerJoin('parcela.mesesPagos', 'mesesPagos', 'WITH', 'parcela.id = mesesPagos.parcela')
//            ->addSelect('mesesPagos')
//            ->where('conta.perfil = :nu_seq_perfil')
//            ->setParameter('nu_seq_perfil', $perfilId)
//            ->getQuery()
//            ->getArrayResult();
//    }

    public function listAll(int $perfilId): array
    {
        return $this->createQueryBuilder('conta')
            ->where('conta.perfil = :nu_seq_perfil')
            ->setParameter('nu_seq_perfil', $perfilId)
            ->getQuery()
            ->getResult();
    }
}