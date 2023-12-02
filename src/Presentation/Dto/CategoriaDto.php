<?php

namespace App\Presentation\Dto;

use App\Domain\Dto\Dto;
use App\Domain\Entity\Categoria;
use App\Infrastructure\Validator\Categoria\CategoriaValidator;

class CategoriaDto extends Dto
{
    private function __construct(private ?int $id, private string $nome)
    {
    }

    public function getId(): ?int
    {
        return $this->id;
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
        self::validate($data);

        return new self($data['categoria'] ?? null, $data['nome']);
    }

    public function toArray(): array
    {
        return [
            'categoria' => $this->id,
            'nome' => $this->nome,
        ];
    }

    public function toEntity(): Categoria
    {
        $categoria = new Categoria($this->getId());
        $categoria->setNome($this->getNome());

        return $categoria;
    }

    protected static function validate(array $data): void
    {
        (new CategoriaValidator($data))->validate();
    }
}