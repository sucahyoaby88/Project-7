<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cohensive\Embed\Facades\Embed;

class Content extends Model
{
    public $timestamps = false;
    
    protected $table = 'content';
    protected $fillable = [
        'user_id',
        'type',
        'category',
        'title',
        'description',
        'summary',
        'date_content',
        'source'
    ];

    public function Users()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }

    public function Comment(){
        return $this->hasMany('App\Comment', 'id');
    }

    public function getEmbed()
    {
        $embed = Embed::make($this->source)->parseUrl();

        if (!$embed)
            return '';

        return $embed->getHtml();
    }

    public function getImage()
    {
            if(!$this->source){
                return asset('photo/default.jpg');
            }
            return asset('photo/'.$this->source);
    }
}
