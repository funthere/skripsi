<?php

namespace App;

class ProjectDocument extends GenericModel
{
    protected $fillable = [
        'user_id', 'project_id', 'file_path', 'file_name', 'status'
    ];

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function project()
    {
    	return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
