<?php

/**
 * TodoStorage - handles file operations for todos
 * Simple interface: getAll() and saveAll()
 */
class TodoStorage
{
    private string $filePath;

    public function __construct()
    {
        // Path to JSON file where todos are stored
        $this->filePath = __DIR__ . '/../../data/todos.json';
    }

    /**
     * Get all todos from JSON file
     */
    public function getAll(): array
    {
        // Check if file exists, if not create it with empty array
        if (!file_exists($this->filePath)) {
            $this->saveAll([]);
            return [];
        }

        // Read file content
        $json = file_get_contents($this->filePath);

        // Decode JSON to array
        $todos = json_decode($json, true);

        return $todos ?? [];
    }

    /**
     * Save all todos to JSON file
     */
    public function saveAll(array $todos): void
    {
        // Convert array to JSON with nice formatting
        $json = json_encode($todos, JSON_PRETTY_PRINT);

        // Write to file
        file_put_contents($this->filePath, $json);
    }
}
