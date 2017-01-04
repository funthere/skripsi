<?php

namespace App;

class ProjectSprint extends GenericModel
{
    protected $fillable = [
        'project_id', 'sprint', 'description'
    ];

    public function project()
    {
    	return $this->belongsTo('Project', 'project_id', 'id');
    }
}
