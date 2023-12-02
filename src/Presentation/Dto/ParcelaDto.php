<?php

namespace App\Presentation\Dto;

use App\Domain\Dto\Dto;
use App\Domain\Entity\Parcela;
use App\Infrastructure\Validator\Parcela\ParcelaValidator;

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
        self::validate($data);

        $parcelaDto = new self(
            $data['total'],
            $data['total_pago']
        );

        foreach ($data['meses_pagos'] as $mes) {
            $parcelaDto->setMesesPagos(MesesPagosDto::create(new \DateTime($mes)));
        }

        return $parcelaDto;
    }

    public function toArray(): array
    {
        $paracelaArray = [
            'total' => $this->getTotal(),
            'total_pago' => $this->getTotalPago(),
            'meses_pagos' => []
        ];

        foreach ($this->getMesesPagos() as $mesesPago) {
            array_push($paracelaArray['meses_pagos'], $mesesPago->getDtPagamento());
        }

        return $paracelaArray;
    }

    public function toEntity(): Parcela
    {
        $parcela = new Parcela();
        $parcela->setTotal($this->getTotal());
        $parcela->setPago($this->getTotalPago());

        /** @var MesesPagosDto $mesPago */
        foreach ($this->mesesPagos as $mesPago) {
            $mesEntity = $mesPago->toEntity();
            $parcela->setMesesPagos($mesEntity);
            $mesEntity->setParcela($parcela);
        }

        return $parcela;
    }

    protected static function validate(array $data): void
    {
        (new ParcelaValidator($data))->validate();
    }
}