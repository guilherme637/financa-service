<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @method string getUserIdentifier()
 */
class Usuario extends \Zuske\AuthClient\Security\Usuario
{
    private ?Perfil $perfil;

    public function getPerfil(): Perfil
    {
        return $this->perfil;
    }

    public function setPerfil(Perfil $perfil): void
    {
        $this->perfil = $perfil;
    }
}