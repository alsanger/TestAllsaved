@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Task</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-secondary">
                Back to Tasks
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Task Information</div>
        <div class="card-body">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="priority" class="form-label">Priority</label>
                        <input type="number" class="form-control" id="priority" name="priority" min="1" max="5" value="{{ $task->priority }}">
                    </div>
                    <div class="col-md-4">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Task</button>
            </form>
        </div>
    </div>
@endsection
