<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recruitment extends Model
{
    use SoftDeletes;
    
    public function getByOrder()
    {
        return $this::with('user')->orderBy('updated_at', 'DESC')->get();
    }
    
    protected $fillable = [
        'user_id',
        'recruitment_contents',
        'category',
        'conditions',
        'class',
        'location'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
