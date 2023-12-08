<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Situacao
{
    private ?int $id;
    private string $descricao;
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

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }
}