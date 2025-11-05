<?php declare(strict_types=1);
require_once __DIR__ . '/../View/TodoView.php';
require_once __DIR__ . '/../Model/TodoService.php';

class TodoController
{
    public function __construct(
        private TodoService $service,
        private TodoView $view)
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
