<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = ['title','edition','authur','download_path','user_id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
