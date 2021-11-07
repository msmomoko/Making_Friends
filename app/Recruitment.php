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
        'class'
    ];
}
