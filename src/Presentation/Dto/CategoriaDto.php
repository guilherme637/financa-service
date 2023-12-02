<?php

namespace App\Presentation\Dto;

use App\Domain\Dto\Dto;
use App\Domain\Entity\Categoria;

class CategoriaDto extends Dto
{
    private function __construct(private ?int $id, private string $nome)
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public static function fromArray(array $data): CategoriaDto
    {
        return new self($data['categoria'] ?? null, $data['nome']);
    }

    public function toArray(): array
    {
        return call_user_func('get_object_vars', $this);
    }

    public function toEntity(): Categoria
    {
        $categoria = new Categoria($this->getId());
        $categoria->setNome($this->getNome());

        return $categoria;
    }
}