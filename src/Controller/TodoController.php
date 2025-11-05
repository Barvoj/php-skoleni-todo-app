<?php declare(strict_types=1);
require_once __DIR__ . '/../View/TodoView.php';

class TodoController
{
    public function __construct(private TodoView $view)
    {
    }

    public function listOfTodos(): void
    {
        // Náčíst todo z uložiště
        $todos = [
            ['text' => "Zajet do servisu", "isDone" => false],
            ['text' => "Nakoupit", 'isDone' => true],
        ];
        // Vypsat je do view
        $this->view->render($todos);
    }
}
