<?php

namespace App\Domain\Adapter\Persistence;

use App\Domain\Entity\Situacao;

interface SituacaoRepositoryInterface extends AbstractRepositoryInterface
{
    public function findSituacao(int $situacao): ?Situacao;
}