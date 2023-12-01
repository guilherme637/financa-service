<?php

namespace App\Domain\Entity;

class MesesPagos
{
    private int $id;
    private \DateTime $dtPagamento;
    private Parcela $parcela;

    public function getId(): int
    {
        return $this->id;
    }

    public function getDtPagamento(): \DateTime
    {
        return $this->dtPagamento;
    }

    public function setDtPagamento(\DateTime $dtPagamento): void
    {
        $this->dtPagamento = $dtPagamento;
    }

    public function getParcela(): Parcela
    {
        return $this->parcela;
    }

    public function setParcela(Parcela $parcela): void
    {
        $this->parcela = $parcela;
    }
}