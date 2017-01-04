<?php

namespace App;

class UserProject extends GenericModel
{
    protected $fillable = [
        'user_id', 'project_id',
    ];

    public function user()
    {
    	return $this->belongsTo('User', 'user_id', 'id');
    }

    public function project()
    {
    	return $this->belongsTo('Project', 'project_id', 'id');
    }
}
