<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for handling task operations
 */
class TaskService
{
    /**
     * Get all tasks from the database
     *
     * @return Collection
     */
    public function getAllTasks()
    {
        // Отримання всіх задач з бази даних
        return Task::orderBy('priority', 'desc')->get();
    }

    /**
     * Create a new task
     *
     * @param array $data
     * @return Task
     */
    public function createTask(array $data): Task
    {
        // Створення нової задачі
        return Task::create($data);
    }

    /**
     * Update an existing task
     *
     * @param Task $task
     * @param array $data
     * @return bool
     */
    public function updateTask(Task $task, array $data): bool
    {
        // Оновлення існуючої задачі
        return $task->update($data);
    }

    /**
     * Delete a task
     *
     * @param Task $task
     * @return bool|null
     */
    public function deleteTask(Task $task): ?bool
    {
        // Видалення задачі
        return $task->delete();
    }
}
