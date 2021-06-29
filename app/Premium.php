<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    public $timestamps = false;
    
    protected $table = 'premium';
    protected $fillable = [
        'user_id',
        'message',
        'date_confirm'
    ];

    public function Users()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }
}
