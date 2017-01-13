<?php

namespace App;

class Chat extends GenericModel
{
    protected $fillable = [
        'user_id', 'project_id', 'message', 'status'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function project()
    {
    	return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
