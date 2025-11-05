<?php declare(strict_types=1);
require_once __DIR__ . '/../Storage/TodoStorage.php';

class TodoService
{
    public function __construct(private TodoStorage $storage)
    {
    }

    public function getListOfTodos(): array
    {
        return $this->storage->getAll();
    }

    public function addTodo(string $todoText): void
    {
        $todos = $this->storage->getAll();
        $todos[] = [
            'id' => uniqid(),
            'text' => $todoText,
            'isDone' => false,
            'created' => date('Y-m-d H:i:s'),
        ];
        $this->storage->saveAll($todos);
    }
}
