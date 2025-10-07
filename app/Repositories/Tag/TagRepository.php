<?php

namespace App\Repositories\Tag;

use App\Repositories\AbstractRepository;
use App\Models\Tag;

class TagRepository extends AbstractRepository implements TagRepositoryInterface
{
    protected $model;

    function __construct(Tag $model)
    {
        $this->model = $model;
    }

    public function create(array $request)
    {
        $tag = $this->model->create($request);
        return $tag;
    }

    public function update(int $id, array $request)
    {
        $tag = $this->model->find($id);
        $tag->update($request);
    }

    public function delete(int $id)
    {
        $tag = $this->model->find($id);
        $tag->delete();
        $tag->tasks()->detach();
    }
}
