<?php

namespace App\Infrastructure\Validator\Conta;

use App\Infrastructure\Validator\Conta\Constraint\CategoriaConstraint;
use App\Infrastructure\Validator\Conta\Constraint\DescricaoConstraint;
use App\Infrastructure\Validator\Conta\Constraint\MesDividaConstraint;
use App\Infrastructure\Validator\Conta\Constraint\SituacaoConstraint;
use App\Infrastructure\Validator\Conta\Constraint\ValorConstraint;
use App\Infrastructure\Validator\ValidatorAbstract;

class ContaValidator extends ValidatorAbstract
{
    public function validate(): void
    {
        $chain = new ValorConstraint($this->data);
        $chain->setNext(new MesDividaConstraint($this->data))
            ->setNext(new SituacaoConstraint($this->data))
            ->setNext(new CategoriaConstraint($this->data))
            ->setNext(new DescricaoConstraint($this->data))
        ;

        $chain->handle();
    }
}