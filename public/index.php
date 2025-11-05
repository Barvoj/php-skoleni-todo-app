<?php declare(strict_types=1);

require_once __DIR__ . '/../src/Controller/TodoController.php';
require_once __DIR__ . '/../src/Model/TodoService.php';
require_once __DIR__ . '/../src/View/TodoView.php';
require_once __DIR__ . '/../src/Storage/TodoStorage.php';


$controller = new TodoController(
    new TodoService(new TodoStorage()),
    new TodoView(),
);


$path = $_SERVER['REQUEST_URI'];


if ($path === '/') {
    $controller->listOfTodos();
}
if ($path === '/add') {
    $controller->addTodo();
}