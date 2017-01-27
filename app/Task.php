<?php

namespace App;

class Task extends GenericModel
{
    const STATUS_ACTIVE = "active";
    const STATUS_DONE = "done";

    protected $fillable = [
        'assigned_to', 'project_id', 'sprint_id', 'activity', 'description', 'status', 'deadline_datetime', 'submit_datetime'
    ];

    public function assignedTo()
    {
    	return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    public function project()
    {
    	return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function sprint()
    {
    	return $this->belongsTo(ProjectSprint::class, 'sprint_id', 'id');
    }
}
