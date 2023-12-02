<?php

namespace App\Domain\Dto;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

abstract class Dto
{
    abstract public static function fromArray(array $data);
    abstract public function toArray(): array;
    abstract public function toEntity();

    /**
     * @throws BadRequestException
     */
    abstract protected static function validate(array $data): void;
}