<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $guarded = ['tag_ids'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'task_tags', 'task_id', 'tag_id');
    }

    public function date()
    {
        return $this->date ?? '';
    }

    public function description()
    {
        return $this->description ?? '';
    }
}
