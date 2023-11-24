<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @method string getUserIdentifier()
 */
class Usuario extends \Zuske\AuthClient\Security\Usuario
{
    private int $id;
    private string $username;
    private string $email;
    private Collection $contas;

    public function __construct()
    {
        $this->contas = new ArrayCollection();
    }

    public function getContas(): Collection
    {
        return $this->contas;
    }

    public function setContas(Conta $contas): void
    {
        $this->contas->add($contas);
    }
}