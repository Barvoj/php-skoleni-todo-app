<?php declare(strict_types=1);

namespace App\Controller;

class TodoController
{
    public function __construct(private TodoService $service)
    {
    }

    public function listOfTodos(): void
    {
        // Náčíst todo z uložiště
        $todos = $this->service->getListOfTodos();
        // Vypsat je do view
        $this->view->render($todos);
    }

    public function addTodo()
    {
        $todoText = $_POST['text'];
        $this->service->addTodo($todoText);
        $this->redirect('/');
    }

    private function redirect(string $path): void
    {
        header("Location: $path");
        exit;
    }
}
