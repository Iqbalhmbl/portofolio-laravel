<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectFile;
use App\Models\Skill;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = ['title', 'year', 'description', 'tech_stack'];

    protected $casts = [
        'tech_stack' => 'array',
    ];

    public function files()
    {
        return $this->hasMany(ProjectFile::class, 'project_id');
    }

    public function techStackSkills()
    {
        if (!$this->tech_stack) {
            return collect([]);
        }
        return Skill::whereIn('id', $this->tech_stack)->get();
    }
}