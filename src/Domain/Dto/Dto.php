<?php

namespace App\Domain\Dto;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

abstract class Dto
{
    abstract public static function fromArray(array $data);
    abstract public function toArray(): array;

    /**
     * @throws BadRequestException
     */
    protected static function validate(array $data): void
    {

    }

    public static function fromEntity(object $entity)
    {

    }

    public function toEntity()
    {

    }
}