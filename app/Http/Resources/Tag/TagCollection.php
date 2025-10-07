<?php

namespace App\Http\Resources\Tag;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Traits\HasWithResponse;

class TagCollection extends ResourceCollection
{
    use HasWithResponse;

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
