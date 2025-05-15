@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tasks</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-outline-secondary">
                Add New Task
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>
                        @if($task->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif($task->status == 'in_progress')
                            <span class="badge bg-primary">In Progress</span>
                        @else
                            <span class="badge bg-success">Completed</span>
                        @endif
                    </td>
                    <td>{{ $task->priority }}</td>
                    <td>{{ $task->due_date ? $task->due_date->format('Y-m-d') : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Ви впевнені?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
