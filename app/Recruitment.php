<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recruitment extends Model
{
    use SoftDeletes;



    protected $fillable = [
        'user_id',
        'recruitment_contents',
        'category',
        'conditions',
        'class',
        'location',
        'delete_time',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    
        public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
