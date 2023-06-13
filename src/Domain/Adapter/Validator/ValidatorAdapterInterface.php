<?php

namespace App\Domain\Adapter\Validator;

interface ValidatorAdapterInterface
{
    public function validate(object $object);
}