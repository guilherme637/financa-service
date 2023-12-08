<?php

namespace App\Domain\Entity;

class Conta
{
    private int $id;
    private string $descricao;
    private float $valor;
    private \DateTime $mesDivida;
    private Situacao $situacao;
    private Categoria $categoria;
    private Parcela $parcela;
    private Perfil $perfil;

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

    public function getSituacao(): Situacao
    {
        return $this->situacao;
    }

    public function setSituacao(Situacao $situacao): void
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

    public function getPerfil(): Perfil
    {
        return $this->perfil;
    }

    public function setPerfil(Perfil $perfil): void
    {
        $this->perfil = $perfil;
    }
}