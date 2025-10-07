<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'date' => 'date|date_format:Y-m-d|nullable',
            'is_completed' => 'required|boolean',
            'user_id' => 'required|integer',
            'tag_ids' => 'array',
            'tag_ids.*' => 'integer'
        ];
    }
}
