<?php

namespace App\Presentation\Dto;

use App\Domain\Dto\Dto;
use App\Domain\Entity\Conta;
use App\Infrastructure\Build\Conta\ContaBuilder;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ContaDto extends Dto
{
    private function __construct(
        private float $valor,
        private \DateTime $mesDivida,
        private string $situacao,
        private CategoriaDto $categoria,
        private ParcelaDto $parcela,
    ) {}

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

    public function getCategoria(): CategoriaDto
    {
        return $this->categoria;
    }

    public function setCategoria(CategoriaDto $categoria): void
    {
        $this->categoria = $categoria;
    }

    public function getParcela(): ParcelaDto
    {
        return $this->parcela;
    }

    public function setParcela(ParcelaDto $parcela): void
    {
        $this->parcela = $parcela;
    }

    public static function fromArray(array $data): ContaDto
    {
        return new self(
            $data['valor'],
            new \DateTime($data['mes_divida']),
            $data['situacao'],
            CategoriaDto::fromArray($data['categoria']),
            ParcelaDto::fromArray($data['parcela'])
        );
    }

    public function toArray(): array
    {
        return call_user_func('get_object_vars', $this);
    }

    public function toEntity(): Conta
    {
        return (new ContaBuilder())->build($this);
    }

    public function validate()
    {
        if (count($this->toArray()) < 5) {
            throw new BadRequestException('Bad Request');
        }
    }
}