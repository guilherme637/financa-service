<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Perfil
{
    private int $id;
    private string $nome;
    private float $receita;
    private int $usuario;
    private Collection $contas;

    public function __construct()
    {
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

    public function getReceita(): float
    {
        return $this->receita;
    }

    public function setReceita(float $receita): void
    {
        $this->receita = $receita;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario): void
    {
        $this->usuario = $usuario;
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