<?php

namespace App\Presentation\Dto;

use App\Domain\Dto\Dto;
use App\Domain\Entity\Conta;
use App\Infrastructure\Build\Conta\ContaBuilder;
use App\Infrastructure\Validator\Conta\ContaValidator;

class ContaDto extends Dto
{
    private function __construct(
        private string $descricao,
        private float $valor,
        private \DateTime $mesDivida,
        private SituacaoDto $situacao,
        private CategoriaDto $categoria,
        private ?ParcelaDto $parcela
    ) {}

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(?float $valor): void
    {
        $this->valor = $valor;
    }

    public function getMesDivida(): ?\DateTime
    {
        return $this->mesDivida;
    }

    public function setMesDivida(?\DateTime $mesDivida): void
    {
        $this->mesDivida = $mesDivida;
    }

    public function getSituacao(): ?SituacaoDto
    {
        return $this->situacao;
    }

    public function setSituacao(?SituacaoDto $situacao): void
    {
        $this->situacao = $situacao;
    }

    public function getCategoria(): ?CategoriaDto
    {
        return $this->categoria;
    }

    public function setCategoria(?CategoriaDto $categoria): void
    {
        $this->categoria = $categoria;
    }

    public function getParcela(): ?ParcelaDto
    {
        return $this->parcela;
    }

    public function setParcela(?ParcelaDto $parcela): void
    {
        $this->parcela = $parcela;
    }

    public static function fromArray(array $data): ContaDto
    {
        self::validate($data);

        return new self(
            $data['descricao'],
            $data['valor'],
            new \DateTime($data['mes_divida']),
            SituacaoDto::fromArray($data['situacao']),
            CategoriaDto::fromArray($data['categoria']),
            ParcelaDto::fromArray($data['parcela'])
        );
    }

    public function toArray(): array
    {
        return [
            'descricao' => $this->getDescricao(),
            'valor' => $this->getValor(),
            'mes_divida' => $this->getMesDivida(),
            'situacao' => $this->situacao->toArray(),
            'categoria' => $this->categoria->toArray(),
            'parcela' => $this->parcela->toArray(),
        ];
    }

    public function toEntity(): Conta
    {
        return (new ContaBuilder())->build($this);
    }

    protected static function validate(array $data): void
    {
        (new ContaValidator($data))->validate();
    }
}