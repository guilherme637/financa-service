<?php

namespace App\Presentation\Dto\Response;

use App\Domain\Dto\Dto;
use App\Domain\Entity\Categoria;

class CategoriaResponseDto extends Dto
{
    private function __construct(
        private int $categoria,
        private string $descricao,
    ) {

    }

    public function getCategoria(): int
    {
        return $this->categoria;
    }

    public function setCategoria(int $categoria): void
    {
        $this->categoria = $categoria;
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
     * @param Categoria $entity
     */
    public static function fromEntity(object $entity)
    {
        return new self($entity->getId(), $entity->getNome());
    }

    public static function fromArray(array $data)
    {
        return new self($data['id'], $data['descricao']);
    }

    public function toArray(): array
    {
        return [
            'categoria' => $this->getCategoria(),
            'descricao' => $this->getDescricao()
        ];
    }
}