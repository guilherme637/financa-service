<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Categoria
{
    private ?int $id;
    private string $nome;
    private Collection $contas;

    public function __construct(?int $id = null)
    {
        $this->id = $id;
        $this->contas = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getContas(): Collection
    {
        return $this->contas;
    }

    public function setContas(Collection $contas): void
    {
        $this->contas = $contas;
    }
}