<?php

namespace App\Infrastructure\Validator\Situacao;

use App\Infrastructure\Validator\Situacao\Constraint\DescricaoConstraint;
use App\Infrastructure\Validator\Situacao\Constraint\SituacaoIdConstraint;
use App\Infrastructure\Validator\ValidatorAbstract;

class SituacaoValidator extends ValidatorAbstract
{
    public function validate(): void
    {
        $chain = new SituacaoIdConstraint($this->data);
        $chain->setNext(new DescricaoConstraint($this->data));

        $chain->handle();
    }
}