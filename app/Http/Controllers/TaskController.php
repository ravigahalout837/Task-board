<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // GET /api/tasks?board_id={board_id}
    public function index(Request $request)
    {
        $task = task::where('board_id', $request->board_id)->get();
        return view('tasks')->with(compact('task'));
    }

    function addtask()
    {
        return view('add_tasks');
    }

    // POST /api/tasks
    public function store(Request $request)
    {
        $task = new Task($request->all());
        $task->save();
        return response()->json($task, 201);
    }

    // GET /api/tasks/{task}
    public function show(Task $task)
    {
        return $task;
    }

    // PUT /api/tasks/{task}
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return response()->json($task, 200);
    }

    // DELETE /api/tasks/{task}
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}

