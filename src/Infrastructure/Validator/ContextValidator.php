<?php

namespace App\Infrastructure\Validator;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class ContextValidator
{
    private Collection $service;

    public function __construct()
    {
        $this->service = new ArrayCollection();
    }

    public function setService(string $name, object $service): void
    {
        $this->service->set($name, $service);
    }

    public function getServiec(string $name)
    {
        return $this->service->get($name);
    }
}