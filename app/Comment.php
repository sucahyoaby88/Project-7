<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;

    protected $table = 'comment';
    protected $fillable = [
        'user_id',
        'content_id',
        'text',
        'date_comment'
    ];

    public function Users()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }

    public function Content()
    {
        return $this->belongsTo('App\Content', 'content_id');
    }

    public function getDate()
    {
        return \Carbon\Carbon::parse($this->attributes['date_comment'])
        ->diffForHumans();
    }
}
