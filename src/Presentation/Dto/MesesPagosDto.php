<?php

namespace App\Presentation\Dto;

use App\Domain\Dto\Dto;
use App\Domain\Entity\MesesPagos;
use App\Infrastructure\Validator\MesPago\MesPagoValidator;

class MesesPagosDto extends Dto
{
    private function __construct(private \DateTime $dtPagamento)
    {
    }

    public function getDtPagamento(): \DateTime
    {
        return $this->dtPagamento;
    }

    public function setDtPagamento(\DateTime $dtPagamento): void
    {
        $this->dtPagamento = $dtPagamento;
    }

    public static function create(\DateTime $dateTime): MesesPagosDto
    {
        return new self($dateTime);
    }

    public static function fromArray(array $data): MesesPagosDto
    {
        self::validate($data);

        return new self(new \DateTime(current($data)));
    }

    public function toArray(): array
    {
        return [
          $this->dtPagamento
        ];
    }

    public function toEntity(): MesesPagos
    {
        $mesPago = new MesesPagos();
        $mesPago->setDtPagamento($this->dtPagamento);

        return $mesPago;
    }

    protected static function validate(array $data): void
    {
        (new MesPagoValidator($data))->validate();
    }
}