@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Task Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-secondary">
                Back to Tasks
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Task #{{ $task->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text">{{ $task->description }}</p>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Status:</strong>
                    @if($task->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($task->status == 'in_progress')
                        <span class="badge bg-primary">In Progress</span>
                    @else
                        <span class="badge bg-success">Completed</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <strong>Priority:</strong> {{ $task->priority }}
                </div>
                <div class="col-md-4">
                    <strong>Due Date:</strong> {{ $task->due_date ? $task->due_date->format('Y-m-d') : 'N/A' }}
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Ви впевнені?')">Delete</button>
                </form>
            </div>
        </div>
        <div class="card-footer text-muted">
            Created: {{ $task->created_at->format('Y-m-d H:i') }}
            <br>
            Last Updated: {{ $task->updated_at->format('Y-m-d H:i') }}
        </div>
    </div>
@endsection
