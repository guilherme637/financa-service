<?php

namespace App\Infrastructure\Validator\Parcela;

use App\Infrastructure\Validator\Parcela\Constraint\TotalConstraint;
use App\Infrastructure\Validator\Parcela\Constraint\TotalPagoConstraint;
use App\Infrastructure\Validator\ValidatorAbstract;

class ParcelaValidator extends ValidatorAbstract
{
    public function validate(): void
    {
        $chain = new TotalConstraint($this->data);
        $chain->setNext(new TotalPagoConstraint($this->data));

        $chain->handle();
    }
}