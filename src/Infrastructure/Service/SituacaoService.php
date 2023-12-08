<?php

namespace App\Infrastructure\Service;

use App\Domain\Adapter\Persistence\SituacaoRepositoryInterface;
use App\Domain\Entity\Situacao;

class SituacaoService
{
    public function __construct(private readonly SituacaoRepositoryInterface $situacaoRepository)
    {
    }

    public function find(int $situacao): ?Situacao
    {
        return $this->situacaoRepository->findSituacao($situacao);
    }
}