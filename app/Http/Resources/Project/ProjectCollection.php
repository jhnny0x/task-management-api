<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Traits\HasWithResponse;

class ProjectCollection extends ResourceCollection
{
    use HasWithResponse;

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
