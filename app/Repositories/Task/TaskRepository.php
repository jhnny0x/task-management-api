<?php

namespace App\Repositories\Task;

use App\Repositories\AbstractRepository;
use App\Models\Task;

class TaskRepository extends AbstractRepository implements TaskRepositoryInterface
{
    protected $model;

    function __construct(Task $model)
    {
        $this->model = $model;
    }

    public function create(array $request)
    {
        $task = $this->model->create($request);
        if (count($request['tag_ids'])) {
            $task->tags()->attach($request['tag_ids']);
        }

        return $task;
    }

    public function update(int $id, array $request)
    {
        $task = $this->model->find($id);
        $task->update($request);
        if (count($request['tag_ids'])) {
            $task->tags()->sync($request['tag_ids']);
        }
    }

    public function delete(int $id)
    {
        $task = $this->model->find($id);
        $task->delete();
    }
}
