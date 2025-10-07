<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $guarded = [];

    public function tasks()
    {
        return $this->belongsToMany('App\Models\Tag', 'task_tags', 'tag_id', 'task_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function description()
    {
        return $this->description ?? '';
    }
}
