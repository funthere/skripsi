<?php

namespace App;

class ProjectSprint extends GenericModel
{
    protected $fillable = [
        'project_id', 'sprint', 'description'
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function tasks()
    {
    	return $this->hasMany(Task::class, 'sprint_id', 'id');
    }
}
