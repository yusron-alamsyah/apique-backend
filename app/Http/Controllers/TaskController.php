<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'in:pending,done',
        ]);

        try {
            $task = Task::create($validated);
            return response()->json($task, status: 201);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return response()->json(['error' => 'Failed to create task', 'message' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        $tasks = Task::all();

        return response()->json($tasks);
    }

    public function update(Request $request, $id)
    {
        try {
            $task = Task::findOrFail($id);

            $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|in:pending,done',
            ]);


            $task->update($validated);

            return response()->json($task);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update task', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();

            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete task', 'message' => $e->getMessage()], 500);
        }
    }
}
