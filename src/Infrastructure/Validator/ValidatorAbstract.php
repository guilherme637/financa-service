<?php

namespace App\Infrastructure\Validator;

abstract class ValidatorAbstract
{
    public function __construct(protected readonly array $data)
    {
    }

    abstract public function validate(): void;
}