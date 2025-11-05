<?php declare(strict_types=1);

class TodoView
{
    public function render(array $todos)
    {
        ?><!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List - PHP MVC</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
<div class="container">
    <h1>Todo List</h1>

    <!-- Form to add new todo -->
    <form method="POST" action="/add" class="add-form">
        <input
            type="text"
            name="text"
            placeholder="Co potřebuješ udělat?"
            required
            autofocus
        >
        <button type="submit">Přidat</button>
    </form>

    <ul class="todo-list">
        <?php if (empty($todos)) { ?>
            <p class="empty-message">Zatím nemáš žádné úkoly. Přidej si první!</p>
        <?php } ?>
        <?php foreach($todos as $todo) { ?>
            <li class="todo-item">
            <span class="todo-text <?php if ($todo['isDone']) echo 'completed'; ?>">
                <?php echo $todo['text']; ?>
            </span>
                <div class="todo-actions">
                    <?php if ($todo['isDone'] === false) { ?>
                        <a href="#" class="btn btn-toggle">
                            Hotovo
                        </a>
                    <?php } ?>
                    <a href="#" class="btn btn-delete">
                        Smazat
                    </a>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>
</body>
</html><?php
    }
}
