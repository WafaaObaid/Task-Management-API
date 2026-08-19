<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{

    public function index(Request $request)
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function webIndex()
    {

        $tasks = auth()->user()->tasks()->get();

        return view('tasks.index', compact('tasks'));
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
            'status' => 'nullable|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);
        $task = auth()->user()->tasks()->create($validated);
        if ($request->is('api/*')) {
            return response()->json($task, 201);
        }
        return redirect()->route('tasks.index')
            ->with('success', 'Task added successfully.');
    }

    public function show(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        return response()->json($task);
    }

    public function edit(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }
        return view('tasks.edit', compact('task'));
    }
    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        $task->update($validated);

        return response()->json($task);
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $task->delete();

        return response()->json([
            'message' => 'Task deleted successfully'
        ]);
    }
}
