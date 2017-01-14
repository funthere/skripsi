<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Sofa\Eloquence\Eloquence;

class User extends Authenticatable
{
    use Notifiable;
    use Eloquence;

    protected $searchableColumns = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userProject()
    {
        return $this->hasMany(UserProject::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}
