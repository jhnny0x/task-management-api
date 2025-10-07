<?php

namespace App\Http\Controllers;

use App\Repositories\Project\ProjectRepositoryInterface as Project;
use App\Http\Requests\Project\{ StoreProjectRequest, UpdateProjectRequest };

class ProjectController extends Controller
{
    private $project;

    function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        return $this->project->where('user_id', $user_id)->get();
    }

    public function store(StoreProjectRequest $request)
    {
        $payload = $request->all();
        $this->project->create($payload);

        return response()->json(['message' => 'Project created successfully']);
    }

    public function show(int $id)
    {
        $user_id = auth()->user()->id;
        return $this->project->where('user_id', $user_id)->find($id);
    }

    public function update(UpdateProjectRequest $request, int $id)
    {
        $payload = $request->all();
        $this->project->update($id, $payload);

        return response()->json(['message' => 'Project updated successfully']);
    }

    public function destroy(int $id)
    {
        $this->project->delete($id);
        return response()->json(['message' => 'Project deleted successfully']);
    }
}
