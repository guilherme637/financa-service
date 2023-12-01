<?php

namespace App\Domain\Adapter\Persistence;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

abstract class AbstractRepository extends ServiceEntityRepository implements AbstractRepositoryInterface
{
    public function __construct(protected readonly ManagerRegistry $registry)
    {
        parent::__construct($registry, $this->entity());
    }

    abstract protected function entity(): string;

    public function save(object $entity): void
    {
        $this->registry->getManager()->persist($entity);
        $this->registry->getManager()->flush();
    }
}