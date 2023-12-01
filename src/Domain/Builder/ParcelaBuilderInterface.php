<?php

namespace App\Domain\Builder;

use App\Domain\Entity\Conta;
use App\Domain\Entity\Parcela;
use App\Presentation\Dto\VO\ParcelaVO;

interface ParcelaBuilderInterface
{
    public function build(ParcelaVO $parcelaVO, Conta $conta): Parcela;
}