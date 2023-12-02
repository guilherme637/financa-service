<?php

namespace App\Infrastructure\Validator\Categoria;

use App\Infrastructure\Validator\Categoria\Constraint\CategoriaIdConstraint;
use App\Infrastructure\Validator\Categoria\Constraint\NomeConstraint;
use App\Infrastructure\Validator\ValidatorAbstract;

class CategoriaValidator extends ValidatorAbstract
{
    public function validate(): void
    {
        $chain = new NomeConstraint($this->data);
        $chain->setNext(new CategoriaIdConstraint($this->data));

        $chain->handle();
    }
}