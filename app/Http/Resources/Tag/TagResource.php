<?php

namespace App\Http\Resources\Tag;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\HasWithResponse;

class TagResource extends JsonResource
{
    use HasWithResponse;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description(),
        ];
    }
}
