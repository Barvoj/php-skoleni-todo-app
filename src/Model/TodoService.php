<?php declare(strict_types=1);

namespace App\Model;

use App\Entity\Todo;
use App\Entity\User;
use App\Repository\TodoRepository;

class TodoService
{
    public function __construct(private TodoRepository $todoRepository)
    {
    }

    /**
     * @return Todo[]
     */
    public function getListOfTodos(): array
    {
        return $this->todoRepository->findAll();
    }

    public function addTodo(string $todoText, User $user): void
    {
        $todo = new Todo();
        $todo->setText($todoText);
        $todo->setUser($user);

        $this->todoRepository->save($todo);
    }
}
