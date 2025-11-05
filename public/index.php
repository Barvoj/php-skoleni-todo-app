<?php declare(strict_types=1);

require_once __DIR__ . '/../src/View/TodoView.php';

$view = new TodoView();
$view->render([
    ["text" => "Zajet do servisu"],
    ["text" => "Nakoupit suroviny na večeři"],
]);