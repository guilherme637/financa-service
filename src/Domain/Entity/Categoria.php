<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Categoria
{
    private int $id;
    private int $nome;
    private Collection $contas;

    public function __construct()
    {
        $this->contas = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): int
    {
        return $this->nome;
    }

    public function setNome(int $nome): void
    {
        $this->nome = $nome;
    }

    public function getContas(): Collection
    {
        return $this->contas;
    }

    public function setContas(Conta $contas): void
    {
        $this->contas->add($contas);
    }
}