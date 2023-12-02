<?php

namespace App\Domain\Dto;

abstract class Dto
{
    abstract public static function fromArray(array $data);
    abstract public function toArray(): array;
    abstract public function toEntity();
}