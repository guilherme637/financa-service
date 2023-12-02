<?php

namespace App\Presentation\Dto;

use App\Domain\Dto\Dto;
use App\Domain\Entity\MesesPagos;

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

    public static function fromArray(array $data): MesesPagosDto
    {
        return new self(new \DateTime(current($data)));
    }

    public function toArray(): array
    {
        return call_user_func('get_object_vars', $this);
    }

    public function toEntity(): MesesPagos
    {
        $mesPago = new MesesPagos();
        $mesPago->setDtPagamento($this->dtPagamento);

        return $mesPago;
    }
}