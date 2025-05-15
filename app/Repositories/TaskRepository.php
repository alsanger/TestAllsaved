<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Repository for Task model
 */
class TaskRepository
{
    /**
     * Get all tasks from the database
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getAll(int $perPage = 10): LengthAwarePaginator
    {
        // Отримання всіх задач з пагінацією
        return Task::orderBy('priority', 'desc')->paginate($perPage);
    }

    /**
     * Find task by ID
     *
     * @param int $id
     * @return Task|null
     */
    public function findById(int $id): ?Task
    {
        // Знаходження задачі за ідентифікатором
        return Task::find($id);
    }

    /**
     * Create new task
     *
     * @param array $data
     * @return Task
     */
    public function create(array $data): Task
    {
        // Створення нової задачі
        return Task::create($data);
    }

    /**
     * Update task
     *
     * @param Task $task
     * @param array $data
     * @return bool
     */
    public function update(Task $task, array $data): bool
    {
        // Оновлення існуючої задачі
        return $task->update($data);
    }

    /**
     * Delete task
     *
     * @param Task $task
     * @return bool|null
     */
    public function delete(Task $task): ?bool
    {
        // Видалення задачі
        return $task->delete();
    }

    /**
     * Get tasks by status
     *
     * @param string $status
     * @return Collection
     */
    public function getByStatus(string $status): Collection
    {
        // Отримання задач за статусом
        return Task::where('status', $status)->get();
    }

    /**
     * Get tasks count grouped by status
     *
     * @return array
     */
    public function getCountByStatus(): array
    {
        // Отримання кількості задач за статусами
        return [
            'pending' => Task::where('status', 'pending')->count(),
            'in_progress' => Task::where('status', 'in_progress')->count(),
            'completed' => Task::where('status', 'completed')->count(),
            'total' => Task::count(),
        ];
    }
}
