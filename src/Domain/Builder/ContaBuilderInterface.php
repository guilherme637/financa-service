<?php

namespace App\Domain\Builder;

use App\Domain\Entity\Categoria;
use App\Domain\Entity\Conta;
use App\Domain\Entity\Usuario;
use App\Presentation\Dto\ContaDto;

interface ContaBuilderInterface
{
    public function build(ContaDto $contaDto): Conta;
}