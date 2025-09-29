<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class ProjectFile extends Model
{
    protected $table = 'project_files';

    protected $fillable = ['project_id', 'file_path', 'file_type'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}