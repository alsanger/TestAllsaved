<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Створення мокових задач для демонстрації
        $tasks = [
            [
                'title' => 'Налаштувати проект',
                'description' => 'Встановити Laravel та налаштувати базову структуру проекту',
                'status' => 'completed',
                'due_date' => now()->subDays(2),
                'priority' => 3
            ],
            [
                'title' => 'Створити шаблони',
                'description' => 'Розробити базові шаблони для проекту використовуючи Blade',
                'status' => 'in_progress',
                'due_date' => now()->addDay(),
                'priority' => 2
            ],
            [
                'title' => 'Налаштувати маршрути',
                'description' => 'Налаштувати всі необхідні маршрути для додатку',
                'status' => 'pending',
                'due_date' => now()->addDays(3),
                'priority' => 1
            ],
            [
                'title' => 'Написати тести',
                'description' => 'Створити базові тести для перевірки функціоналу',
                'status' => 'pending',
                'due_date' => now()->addDays(5),
                'priority' => 1
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
