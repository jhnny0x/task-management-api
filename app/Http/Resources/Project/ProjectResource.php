<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\HasWithResponse;

class ProjectResource extends JsonResource
{
    use HasWithResponse;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description(),
            'is_archived' => $this->is_archived
        ];
    }
}
