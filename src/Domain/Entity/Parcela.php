<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Parcela
{
    private int $id;
    private int $total;
    private int $pago;
    private Conta $conta;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    public function getPago(): int
    {
        return $this->pago;
    }

    public function setPago(int $pago): void
    {
        $this->pago = $pago;
    }

    public function getContas(): Conta
    {
        return $this->conta;
    }

    public function setContas(Conta $contas): void
    {
        $this->conta = $contas;
    }
}