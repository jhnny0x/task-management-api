<?php

namespace App\Http\Controllers;

use App\Repositories\Tag\TagRepositoryInterface as Tag;
use App\Http\Requests\Tag\{ StoreTagRequest, UpdateTagRequest };
use App\Http\Resources\Tag\{ TagResource, TagCollection };

class TagController extends Controller
{
    private $tag;

    function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $tags = $this->tag->where('user_id', $user_id)->get();

        return new TagCollection($tags);
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
        $tag = $this->tag->where('user_id', $user_id)->find($id);

        return new TagResource($tag);
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
