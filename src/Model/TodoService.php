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
}
