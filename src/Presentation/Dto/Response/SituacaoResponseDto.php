<?php

namespace App\Presentation\Dto\Response;

use App\Domain\Dto\Dto;
use App\Domain\Entity\Situacao;

class SituacaoResponseDto extends Dto
{
    private function __construct(
        private int $situacao,
        private string $descricao,
    ) {
    }

    public function getSituacao(): int
    {
        return $this->situacao;
    }

    public function setSituacao(int $situacao): void
    {
        $this->situacao = $situacao;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @param Situacao $entity
     */
    public static function fromEntity(object $entity): SituacaoResponseDto
    {
        return new self($entity->getId(), $entity->getDescricao());
    }

    public static function fromArray(array $data)
    {
        return new self($data['id'], $data['descricao']);
    }

    public function toArray(): array
    {
        return [
            'situacao' => $this->getSituacao(),
            'descricao' => $this->getDescricao()
        ];
    }
}