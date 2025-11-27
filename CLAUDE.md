# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

PHP Todo application built with Symfony 7.3, using MVC architecture with file-based JSON storage. Educational/training project with Czech language interface.

## Development Commands

### Docker (Recommended)
```bash
docker compose up -d          # Start services (PHP-FPM, Nginx, PostgreSQL)
# Access at http://localhost:8080
```

### Local Development
```bash
docker compose exec php composer install              # Install dependencies
```

### Testing
```bash
docker compose exec php php bin/phpunit               # Run all tests
docker compose exec php php bin/phpunit tests/YourTest.php  # Run specific test file
```

### Symfony Console
```bash
docker compose exec php php bin/console cache:clear   # Clear cache
docker compose exec php php bin/console               # List all commands
```

## Architecture

**Request Flow:** Nginx → PHP-FPM → `public/index.php` → Symfony Kernel → Router → Controller → Service → Storage → Twig Response

**Key Layers:**
- `src/Controller/TodoController.php` - HTTP handling, routes (`GET /`, `POST /add`)
- `src/Model/TodoService.php` - Business logic (getListOfTodos, addTodo)
- `src/Storage/TodoStorage.php` - JSON file persistence (`data/todos.json`)
- `templates/todo/index.html.twig` - Todo list view

**Data Model (in todos.json):**
```json
{"id": "uniqid", "text": "description", "isDone": false, "created": "timestamp"}
```

## Tech Stack

- PHP 8.2+ with strict types
- Symfony 7.3 framework
- Twig templating
- PostgreSQL 16 (configured but unused - todos use JSON file)
- Docker Compose for containerization
- PHPUnit 11.5 for testing

## Current State

**Working:** Display todos, add new todos
**Not implemented:** Toggle completion, delete todo (UI buttons exist, backend missing)
