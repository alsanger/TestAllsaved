<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\TaskService;
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
    protected $taskService;

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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->taskService->createTask($request->all());

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
     * @param Request $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $this->taskService->updateTask($task, $request->all());

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
        $this->taskService->deleteTask($task);

        return redirect()->route('tasks.index')
            ->with('success', 'Задачу успішно видалено');
    }
}
