<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'project_id');
    }

    public function description()
    {
        return $this->description ?? '';
    }
}
