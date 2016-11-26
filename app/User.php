<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
    public function books()
    {
        return $this->hasMany('App\Book');
    } 
    // This function allows us to get a list of users following us
    public function followers()
    {
        return $this->belongsToMany('App\User', 'user_user', 'following_id', 'follower_id')->withTimestamps();
    }

    // Get all users we are following
    public function followings()
    {
        return $this->belongsToMany('App\User', 'user_user', 'follower_id', 'following_id')->withTimestamps();
    }
}
