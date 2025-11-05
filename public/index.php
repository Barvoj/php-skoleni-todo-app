<?php declare(strict_types=1);

require_once __DIR__ . '/../src/Controller/TodoController.php';
require_once __DIR__ . '/../src/View/TodoView.php';


$controller = new TodoController(
    new TodoView(),
);

$controller->listOfTodos();