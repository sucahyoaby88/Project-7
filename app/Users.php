<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $timestamps = false;
    
    protected $table = 'user';
    protected $fillable = [
        'email',
        'phone',
        'level',
        'username',
        'password'
    ];

    public function Content(){
        return $this->hasMany('App\Content', 'id');
    }

    public function Comment(){
        return $this->hasMany('App\Comment', 'id');
    }

    public function Premium(){
        return $this->hasOne('App\Premium', 'id');
    }

}
