<?php

namespace App\Presentation\Dto;

use App\Presentation\Dto\VO\ParcelaVO;

class CreateFinancasPostDto
{
    public function __construct(
        private float $valor,
        private string $mesDivida,
        private string $situacao,
        private string $categoria,
        private ParcelaVO $parcela,
    ) {}

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

    public function getMesDivida(): string
    {
        return $this->mesDivida;
    }

    public function setMesDivida(string $mesDivida): void
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

    public function getCategoria(): string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): void
    {
        $this->categoria = $categoria;
    }

    public function getParcela(): ParcelaVO
    {
        return $this->parcela;
    }

    public function setParcela(ParcelaVO $parcela): void
    {
        $this->parcela = $parcela;
    }
}