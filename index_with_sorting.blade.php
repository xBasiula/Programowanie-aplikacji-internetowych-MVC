@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-5">
                <i class="bi bi-list-task"></i> Task List
            </h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Create New Task
            </a>
        </div>
    </div>

    @if($tasks->isEmpty())
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> No tasks yet. Create your first task to get started!
        </div>
    @else
        <!-- Sorting Controls -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-auto">
                        <strong><i class="bi bi-funnel"></i> Sort by:</strong>
                    </div>
                    <div class="col-md">
                        <div class="btn-group flex-wrap" role="group">
                            <a href="{{ route('tasks.index', ['sort' => 'status', 'order' => $sortBy === 'status' && $order === 'asc' ? 'desc' : 'asc']) }}"
                               class="btn btn-sm {{ $sortBy === 'status' ? 'btn-primary' : 'btn-outline-primary' }}">
                                <i class="bi bi-circle-square"></i> Status
                                @if($sortBy === 'status')
                                    <i class="bi bi-arrow-{{ $order === 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </a>
                            <a href="{{ route('tasks.index', ['sort' => 'priority', 'order' => $sortBy === 'priority' && $order === 'asc' ? 'desc' : 'asc']) }}"
                               class="btn btn-sm {{ $sortBy === 'priority' ? 'btn-primary' : 'btn-outline-primary' }}">
                                <i class="bi bi-exclamation-triangle"></i> Priority
                                @if($sortBy === 'priority')
                                    <i class="bi bi-arrow-{{ $order === 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </a>
                            <a href="{{ route('tasks.index', ['sort' => 'due_date', 'order' => $sortBy === 'due_date' && $order === 'asc' ? 'desc' : 'asc']) }}"
                               class="btn btn-sm {{ $sortBy === 'due_date' ? 'btn-primary' : 'btn-outline-primary' }}">
                                <i class="bi bi-calendar-event"></i> Due Date
                                @if($sortBy === 'due_date')
                                    <i class="bi bi-arrow-{{ $order === 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </a>
                            <a href="{{ route('tasks.index', ['sort' => 'title', 'order' => $sortBy === 'title' && $order === 'asc' ? 'desc' : 'asc']) }}"
                               class="btn btn-sm {{ $sortBy === 'title' ? 'btn-primary' : 'btn-outline-primary' }}">
                                <i class="bi bi-alphabet"></i> Title
                                @if($sortBy === 'title')
                                    <i class="bi bi-arrow-{{ $order === 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </a>
                            <a href="{{ route('tasks.index', ['sort' => 'created_at', 'order' => $sortBy === 'created_at' && $order === 'asc' ? 'desc' : 'asc']) }}"
                               class="btn btn-sm {{ $sortBy === 'created_at' ? 'btn-primary' : 'btn-outline-primary' }}">
                                <i class="bi bi-clock-history"></i> Created
                                @if($sortBy === 'created_at')
                                    <i class="bi bi-arrow-{{ $order === 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </a>
                            @if($sortBy !== 'created_at' || $order !== 'desc')
                                <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($tasks as $task)
                <div class="col">
                    <div class="card h-100 task-card-{{ $task->status }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $task->title }}</h5>
                            <p class="card-text text-muted">
                                {{ Str::limit($task->description, 100) }}
                            </p>

                            <div class="mb-3">
                            <span class="badge {{ $task->getStatusBadgeClass() }}">
                                @if($task->status === 'todo')
                                    <i class="bi bi-circle"></i>
                                @elseif($task->status === 'in_progress')
                                    <i class="bi bi-arrow-repeat"></i>
                                @else
                                    <i class="bi bi-check-circle"></i>
                                @endif
                                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                            </span>
                                <span class="badge {{ $task->getPriorityBadgeClass() }}">
                                @if($task->priority === 'high')
                                        <i class="bi bi-exclamation-triangle"></i>
                                    @elseif($task->priority === 'medium')
                                        <i class="bi bi-dash-circle"></i>
                                    @else
                                        <i class="bi bi-arrow-down-circle"></i>
                                    @endif
                                    {{ ucfirst($task->priority) }} Priority
                            </span>
                            </div>

                            @if($task->due_date)
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar-event"></i>
                                        Due: {{ $task->due_date->format('M d, Y') }}
                                    </small>
                                </p>
                            @endif
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="btn-group w-100" role="group">
                                <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i> View
                                </a>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure you want to delete this task?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-info-circle"></i> Status Legend</h5>
                        <div class="d-flex flex-wrap gap-3">
                            <div>
                            <span class="badge bg-secondary">
                                <i class="bi bi-circle"></i> To Do
                            </span>
                                <small class="text-muted ms-2">Gray Border</small>
                            </div>
                            <div>
                            <span class="badge bg-warning">
                                <i class="bi bi-arrow-repeat"></i> In Progress
                            </span>
                                <small class="text-muted ms-2">Yellow Border</small>
                            </div>
                            <div>
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle"></i> Done
                            </span>
                                <small class="text-muted ms-2">Green Border</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
