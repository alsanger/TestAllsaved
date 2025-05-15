<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

/**
 * Controller for managing tasks
 */
class TaskController extends Controller
{
    /**
     * The task service instance
     *
     * @var TaskService
     */
    protected TaskService $taskService;

    /**
     * Create a new controller instance
     *
     * @param TaskService $taskService
     * @return void
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the tasks
     *
     * @return View
     */
    public function index(): View
    {
        // Отримання списку задач через сервіс
        $tasks = $this->taskService->getAllTasks();

        return view('pages.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new task
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.tasks.create');
    }

    /**
     * Store a newly created task in storage
     *
     * @param TaskRequest $request
     * @return RedirectResponse
     */
    public function store(TaskRequest $request): RedirectResponse
    {
        // Валідація вже відбулася в TaskRequest
        $validatedData = $request->validated();

        // Створення задачі через сервіс
        $this->taskService->createTask($validatedData);

        return redirect()->route('tasks.index')
            ->with('success', 'Задачу успішно створено');
    }

    /**
     * Display the specified task
     *
     * @param Task $task
     * @return View
     */
    public function show(Task $task): View
    {
        return view('pages.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified task
     *
     * @param Task $task
     * @return View
     */
    public function edit(Task $task): View
    {
        return view('pages.tasks.edit', compact('task'));
    }

    /**
     * Update the specified task in storage
     *
     * @param TaskRequest $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        // Валідація вже відбулася в TaskRequest
        $validatedData = $request->validated();

        // Оновлення задачі через сервіс
        $this->taskService->updateTask($task, $validatedData);

        return redirect()->route('tasks.index')
            ->with('success', 'Задачу успішно оновлено');
    }

    /**
     * Remove the specified task from storage
     *
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        // Видалення задачі через сервіс
        $this->taskService->deleteTask($task);

        return redirect()->route('tasks.index')
            ->with('success', 'Задачу успішно видалено');
    }
}
