<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Task\TaskRepositoryInterface as Task;
use App\Http\Requests\Task\{ StoreTaskRequest, UpdateTaskRequest };
use App\Http\Resources\Task\{ TaskCollection, TaskResource };

class TaskController extends Controller
{
    private $task;

    function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $tasks = $this->task->where('user_id', $user_id)->get();

        return new TaskCollection($tasks);
    }

    public function store(StoreTaskRequest $request)
    {
        $payload = $request->all();
        $this->task->create($payload);

        return response()->json(['message' => 'Task created successfully']);
    }

    public function show(int $id)
    {
        $user_id = auth()->user()->id;
        $task = $this->task->with(['project', 'tags'])
            ->where('user_id', $user_id)
            ->find($id);

        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, int $id)
    {
        $payload = $request->all();
        $this->task->update($id, $payload);

        return response()->json(['message' => 'Task updated successfully']);
    }

    public function destroy(int $id)
    {
        $this->task->delete($id);
        return response()->json(['message' => 'Task deleted successfully']);
    }
}
