<?php

namespace App\Http\Controllers;

use App\Repositories\Tag\TagRepositoryInterface as Tag;
use App\Repositories\Task\TaskRepositoryInterface as Task;
use App\Http\Requests\Tag\{ StoreTagRequest, UpdateTagRequest };

class TagController extends Controller
{
    private $tag;
    private $task;

    function __construct(Tag $tag, Task $task)
    {
        $this->tag = $tag;
        $this->task = $task;
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        return Tag::where('user_id', $user_id)->get();
    }

    public function store(StoreTagRequest $request)
    {
        $payload = $request->all();
        $request->user()->tags()->create($payload);

        return response()->json(['message' => 'Tag created successfully']);
    }

    public function show(int $id)
    {
        $user_id = auth()->user()->id;
        return Tag::where('user_id', $user_id)->find($id);
    }

    public function update(UpdateTagRequest $request, int $id)
    {
        $payload = $request->all();
        $this->tag->update($id, $payload);

        return response()->json(['message' => 'Tag updated successfully']);
    }

    public function destroy(int $id)
    {
        $this->tag->delete($id);
        return response()->json(['message' => 'Tag deleted successfully']);
    }
}
