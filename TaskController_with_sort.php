<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->get('sort', 'created_at');
        $order = $request->get('order', 'desc');

        $query = Task::query();

        switch ($sortBy) {
            case 'status':
                // Custom order: todo -> in_progress -> done
                $query->orderByRaw("CASE 
                    WHEN status = 'todo' THEN 1 
                    WHEN status = 'in_progress' THEN 2 
                    WHEN status = 'done' THEN 3 
                END " . ($order === 'asc' ? 'ASC' : 'DESC'));
                break;
            case 'priority':
                // Custom order: high -> medium -> low
                $query->orderByRaw("CASE 
                    WHEN priority = 'high' THEN 1 
                    WHEN priority = 'medium' THEN 2 
                    WHEN priority = 'low' THEN 3 
                END " . ($order === 'asc' ? 'ASC' : 'DESC'));
                break;
            case 'due_date':
                $query->orderBy('due_date', $order)->orderBy('created_at', 'desc');
                break;
            case 'title':
                $query->orderBy('title', $order);
                break;
            default:
                $query->orderBy('created_at', $order);
        }

        $tasks = $query->get();
        
        return view('tasks.index', compact('tasks', 'sortBy', 'order'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in_progress,done',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'nullable|date',
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in_progress,done',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'nullable|date',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }
}
