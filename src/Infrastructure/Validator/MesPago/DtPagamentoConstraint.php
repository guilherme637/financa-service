<?php

namespace App\Infrastructure\Validator\MesPago;

use App\Infrastructure\Validator\ConstraintAbstract;

class DtPagamentoConstraint extends ConstraintAbstract
{
    protected function isValid(string $input): bool
    {
        return empty($this->data);
    }
}