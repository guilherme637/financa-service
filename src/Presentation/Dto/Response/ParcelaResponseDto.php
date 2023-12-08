<?php

namespace App\Presentation\Dto\Response;

use App\Domain\Dto\Dto;
use App\Domain\Entity\MesesPagos;
use App\Domain\Entity\Parcela;
use App\Presentation\Dto\MesesPagosDto;

class ParcelaResponseDto extends Dto
{
    private function __construct(
        private int $total,
        private int $totalPago,
        private array $mesesPagos = []
    )
    {

    }

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

    public function getMesesPagosResponse(): array
    {
        return $this->mesesPagos;
    }

    public function setMesesPagos(MesesPagosDto $mesesPagosResponseDto): void
    {
        $this->mesesPagos[] = $mesesPagosResponseDto;
    }

    /**
     * @param Parcela $entity
     */
    public static function fromEntity(object $entity): ParcelaResponseDto
    {
        $parcelaResponseDto = new self($entity->getTotal(), $entity->getPago());

        /** @var MesesPagos $mesPago */
        foreach ($entity->getMesesPagos() as $mesPago) {
            $parcelaResponseDto->setMesesPagos(MesesPagosDto::create($mesPago->getDtPagamento()));
        }

        return $parcelaResponseDto;
    }

    public static function fromArray(array $data)
    {
        // TODO: Implement fromArray() method.
    }

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }
}