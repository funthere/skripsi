<?php

namespace App;

class Project extends GenericModel
{
    protected $fillable = [
        'project_name', 'description', 'start_datetime', 'finish_datetime', 'pic', 'status_progress'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'pic', 'id');
    }

    public function userProjects()
    {
    	return $this->hasMany('UserProject');
    }

    public function documents()
    {
    	return $this->hasMany('ProjectDocument');
    }

    public function sprints()
    {
    	return $this->hasMany('ProjectSprint');
    }

    public function tasks()
    {
    	return $this->hasMany('Task');
    }
}
