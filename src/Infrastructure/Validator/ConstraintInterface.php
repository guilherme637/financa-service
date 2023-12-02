<?php

namespace App\Infrastructure\Validator;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

interface ConstraintInterface
{
    public function setNext(ConstraintInterface $constraint): ConstraintInterface;

    /**
     * @throws BadRequestException
     */
    public function handle();
}