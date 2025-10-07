<?php

namespace App\Repositories\Project;

use App\Repositories\AbstractRepository;
use App\Models\Project;

class ProjectRepository extends AbstractRepository implements ProjectRepositoryInterface
{
    protected $model;

    function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function create(array $request)
    {
        $project = $this->model->create($request);
        return $project;
    }

    public function update(int $id, array $request)
    {
        $project = $this->model->find($id);
        $project->update($request);
    }

    public function delete(int $id)
    {
        $project = $this->model->find($id);
        $project->tasks()->delete();
        $project->delete();
    }
}
