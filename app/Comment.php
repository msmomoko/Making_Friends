<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'recruitment_id',
        'comment',
    ];
    
    public function recruitment()
    {
        return $this->belongsTo('App\Recruitment');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    

}
