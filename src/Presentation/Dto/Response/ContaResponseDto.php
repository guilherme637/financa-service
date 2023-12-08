<?php

namespace App\Presentation\Dto\Response;

use App\Domain\Dto\Dto;
use App\Domain\Entity\Conta;

class ContaResponseDto extends Dto
{
    private function __construct(
        private string $descricao,
        private float $valor,
        private SituacaoResponseDto $situacao,
        private CategoriaResponseDto $categoria,
        private ParcelaResponseDto $parecela

    ) {

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

    public function getSituacaoDto(): SituacaoResponseDto
    {
        return $this->situacao;
    }

    public function setSituacaoDto(SituacaoResponseDto $situacaoDto): void
    {
        $this->situacao = $situacaoDto;
    }

    public function getCategoriaResponseDto(): CategoriaResponseDto
    {
        return $this->categoria;
    }

    public function setCategoriaResponseDto(CategoriaResponseDto $categoria): void
    {
        $this->categoria = $categoria;
    }

    public function getParecela(): ParcelaResponseDto
    {
        return $this->parecela;
    }

    public function setParecela(ParcelaResponseDto $parecela): void
    {
        $this->parecela = $parecela;
    }

    /**
     * @param Conta $entity
     */
    public static function fromEntity(object $entity)
    {
        return new self(
            $entity->getDescricao(),
            $entity->getValor(),
            SituacaoResponseDto::fromEntity($entity->getSituacao()),
            CategoriaResponseDto::fromEntity($entity->getCategoria()),
            ParcelaResponseDto::fromEntity($entity->getParcela())
        );
    }

    public static function fromArray(array $data)
    {

    }

    public function toArray(): array
    {
        return self::$contas;
    }
}