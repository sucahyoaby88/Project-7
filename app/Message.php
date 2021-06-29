<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;
    
    protected $table = 'message';
    protected $fillable = [
        'user_id',
        'text',
        'date_message'
    ];

    public function Users()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }
}
