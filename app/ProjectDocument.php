<?php

namespace App;

class ProjectDocument extends GenericModel
{
    protected $fillable = [
        'user_id', 'project_id', 'file_path', 'file_name', 'status'
    ];

    public function owner()
    {
    	return $this->belongsTo('User', 'user_id', 'id');
    }

    public function project()
    {
    	return $this->belongsTo('Project', 'project_id', 'id');
    }
}
