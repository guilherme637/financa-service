<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Adapter\Persistence\AbstractRepository;
use App\Domain\Adapter\Persistence\SituacaoRepositoryInterface;
use App\Domain\Entity\Situacao;

class SituacaoRepository extends AbstractRepository implements SituacaoRepositoryInterface
{
    protected function entity(): string
    {
        return Situacao::class;
    }

    public function findSituacao(int $situacao): ?Situacao
    {
        return $this->find($situacao);
    }
}