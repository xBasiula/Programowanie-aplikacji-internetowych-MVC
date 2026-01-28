@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-eye"></i> Task Details</h4>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h2>{{ $task->title }}</h2>
                    <div class="mb-3">
                        <span class="badge {{ $task->getStatusBadgeClass() }} fs-6">
                            {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                        </span>
                        <span class="badge {{ $task->getPriorityBadgeClass() }} fs-6">
                            {{ ucfirst($task->priority) }} Priority
                        </span>
                    </div>
                </div>

                @if($task->description)
                    <div class="mb-4">
                        <h5>Description</h5>
                        <p class="text-muted">{{ $task->description }}</p>
                    </div>
                @endif

                <div class="row mb-4">
                    @if($task->due_date)
                        <div class="col-md-6">
                            <h5><i class="bi bi-calendar-event"></i> Due Date</h5>
                            <p>{{ $task->due_date->format('F d, Y') }}</p>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <h5><i class="bi bi-clock"></i> Created</h5>
                        <p>{{ $task->created_at->format('F d, Y H:i') }}</p>
                    </div>
                </div>

                @if($task->updated_at != $task->created_at)
                    <div class="mb-4">
                        <h5><i class="bi bi-pencil-square"></i> Last Updated</h5>
                        <p>{{ $task->updated_at->format('F d, Y H:i') }}</p>
                    </div>
                @endif

                <div class="d-flex justify-content-between">
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>
                    <div>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this task?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
