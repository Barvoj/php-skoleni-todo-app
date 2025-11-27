<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\Todo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Todo>
 */
class TodoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Todo::class);
    }

    public function save(Todo $todo, bool $flush = true): void
    {
        $this->getEntityManager()->persist($todo);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
