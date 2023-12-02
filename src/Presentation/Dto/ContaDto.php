<?php

namespace App\Presentation\Dto;

use App\Domain\Dto\Dto;
use App\Domain\Entity\Conta;
use App\Infrastructure\Build\Conta\ContaBuilder;
use App\Infrastructure\Validator\Conta\ContaValidator;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ContaDto extends Dto
{
    private function __construct(
        private ?float $valor,
        private ?\DateTime $mesDivida,
        private ?string $situacao,
        private ?CategoriaDto $categoria,
        private ?ParcelaDto $parcela
    ) {}

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

    public function getSituacao(): ?string
    {
        return $this->situacao;
    }

    public function setSituacao(?string $situacao): void
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
            $data['valor'],
            new \DateTime($data['mes_divida']),
            $data['situacao'],
            CategoriaDto::fromArray($data['categoria']),
            ParcelaDto::fromArray($data['parcela'])
        );
    }

    public function toArray(): array
    {
        return [
            'valor' => $this->valor,
            'mes_divida' => $this->mesDivida,
            'situacao' => $this->situacao,
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