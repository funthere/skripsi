<?php

namespace App;

class Project extends GenericModel
{
    protected $fillable = [
        'project_name', 'description', 'start_datetime', 'finish_datetime', 'pic', 'status_progress'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class, 'pic', 'id');
    }

    public function userProjects()
    {
    	return $this->hasMany(UserProject::class);
    }

    public function documents()
    {
    	return $this->hasMany(ProjectDocument::class);
    }

    public function sprints()
    {
    	return $this->hasMany(ProjectSprint::class);
    }

    public function tasks()
    {
    	return $this->hasMany(Task::class);
    }
}
