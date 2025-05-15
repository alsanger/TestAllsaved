<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Service for handling task operations
 */
class TaskService
{
    /**
     * The task repository instance
     *
     * @var TaskRepository
     */
    protected TaskRepository $taskRepository;

    /**
     * Create a new service instance
     *
     * @param TaskRepository $taskRepository
     * @return void
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Get all tasks from the database
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getAllTasks(int $perPage = 10): LengthAwarePaginator
    {
        // Отримання всіх задач через репозиторій
        return $this->taskRepository->getAll($perPage);
    }

    /**
     * Get task by ID
     *
     * @param int $id
     * @return Task|null
     */
    public function getTaskById(int $id): ?Task
    {
        // Отримання задачі за ідентифікатором через репозиторій
        return $this->taskRepository->findById($id);
    }

    /**
     * Create a new task
     *
     * @param array $validatedData
     * @return Task
     */
    public function createTask(array $validatedData): Task
    {
        // Створення нової задачі через репозиторій
        return $this->taskRepository->create($validatedData);
    }

    /**
     * Update an existing task
     *
     * @param Task $task
     * @param array $validatedData
     * @return bool
     */
    public function updateTask(Task $task, array $validatedData): bool
    {
        // Оновлення існуючої задачі через репозиторій
        return $this->taskRepository->update($task, $validatedData);
    }

    /**
     * Delete a task
     *
     * @param Task $task
     * @return bool|null
     */
    public function deleteTask(Task $task): ?bool
    {
        // Видалення задачі через репозиторій
        return $this->taskRepository->delete($task);
    }

    /**
     * Get tasks dashboard statistics
     *
     * @return array
     */
    public function getDashboardStats(): array
    {
        // Отримання статистики для дашборду
        return $this->taskRepository->getCountByStatus();
    }
}
