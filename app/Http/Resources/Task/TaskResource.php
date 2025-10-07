<?php

namespace App\Http\Resources\Task;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\Tag\TagCollection;
use App\Traits\HasWithResponse;

class TaskResource extends JsonResource
{
    use HasWithResponse;

    public function toArray($request)
    {
        $project = $this->project ? new ProjectResource($this->project) : "";
        $tags = $this->tags ? new TagCollection($this->tags) : [];

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description(),
            'date' => $this->date(),
            'is_completed' => $this->is_completed,
            'project' => $project,
            'tags' => $tags,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
