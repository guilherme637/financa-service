<?php

namespace App\Presentation\Dto;

use App\Domain\Dto\Dto;
use App\Domain\Entity\Parcela;

class ParcelaDto extends Dto
{
    private function __construct(
        private int $total,
        private int $totalPago,
        private array $mesesPagos = []
    ) {}

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    public function getTotalPago(): int
    {
        return $this->totalPago;
    }

    public function setTotalPago(int $totalPago): void
    {
        $this->totalPago = $totalPago;
    }

    public function getMesesPagos(): array
    {
        return $this->mesesPagos;
    }

    public function setMesesPagos(MesesPagosDto $mesPago): void
    {
        $this->mesesPagos[] = $mesPago;
    }

    public static function fromArray(array $data): ParcelaDto
    {
        $parcelaDto = new self(
            $data['total'],
            $data['total_pago']
        );

        foreach ($data['meses_pagos'] as $mesPago) {
            $parcelaDto->setMesesPagos(MesesPagosDto::fromArray([$mesPago]));
        }

        return $parcelaDto;
    }

    public function toArray(): array
    {
        return call_user_func('get_object_vars', $this);
    }

    public function toEntity(): Parcela
    {
        $parcela = new Parcela();
        $parcela->setTotal($this->getTotal());
        $parcela->setPago($this->getTotalPago());

        /** @var MesesPagosDto $mesPago */
        foreach ($this->mesesPagos as $mesPago) {
            $parcela->setMesesPagos($mesPago->toEntity());
        }

        return $parcela;
    }
}