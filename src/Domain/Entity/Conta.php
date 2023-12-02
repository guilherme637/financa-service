<?php

namespace App\Domain\Entity;

class Conta
{
    private int $id;
    private float $valor;
    private \DateTime $mesDivida;
    private string $situacao;
    private Categoria $categoria;
    private Parcela $parcela;
    private int $usuario;

    public function getId(): int
    {
        return $this->id;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

    public function getMesDivida(): \DateTime
    {
        return $this->mesDivida;
    }

    public function setMesDivida(\DateTime $mesDivida): void
    {
        $this->mesDivida = $mesDivida;
    }

    public function getSituacao(): string
    {
        return $this->situacao;
    }

    public function setSituacao(string $situacao): void
    {
        $this->situacao = $situacao;
    }

    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(Categoria $categoria): void
    {
        $this->categoria = $categoria;
    }

    public function getParcela(): Parcela
    {
        return $this->parcela;
    }

    public function setParcela(Parcela $parcela): void
    {
        $this->parcela = $parcela;
    }

    public function getUsuario(): int
    {
        return $this->usuario;
    }

    public function setUsuario(int $usuario): void
    {
        $this->usuario = $usuario;
    }
}