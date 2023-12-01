<?php

namespace App\Domain\Builder;

use App\Domain\Entity\Categoria;
use App\Domain\Entity\Conta;
use App\Domain\Entity\Usuario;
use App\Presentation\Dto\CreateFinancasPostDto;

interface ContaBuilderInterface
{
    public function build(
        CreateFinancasPostDto $createFinancasPostDto,
        Categoria $categoria,
        Usuario $usuario
    ): Conta;
}