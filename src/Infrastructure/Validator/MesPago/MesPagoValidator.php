<?php

namespace App\Infrastructure\Validator\MesPago;

use App\Infrastructure\Validator\ValidatorAbstract;

class MesPagoValidator extends ValidatorAbstract
{
    public function validate(): void
    {
        $chian = new DtPagamentoConstraint($this->data);

        $chian->handle();
    }
}