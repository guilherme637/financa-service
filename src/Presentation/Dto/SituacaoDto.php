<?php

namespace App\Presentation\Dto;

use App\Domain\Dto\Dto;
use App\Domain\Entity\Situacao;
use App\Infrastructure\Validator\Situacao\SituacaoValidator;

class SituacaoDto extends Dto
{
    private function __construct(
        private ?int $id,
        private string $descricao
    ) {

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public static function fromArray(array $data): SituacaoDto
    {
        self::validate($data);

        return new self($data['situacao'] ?? null, $data['descricao']);
    }

    public function toArray(): array
    {
        return [
            'situacao' => $this->getId(),
            'descricao' => $this->getDescricao()
        ];
    }

    public function toEntity(): Situacao
    {
        $situacao = new Situacao($this->getId());
        $situacao->setDescricao($this->getDescricao());

        return $situacao;
    }

    protected static function validate(array $data): void
    {
        (new SituacaoValidator($data))->validate();
    }
}