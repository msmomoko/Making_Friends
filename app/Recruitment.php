<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $fillable = [
        'user_id',
        'recruitment_contents',
        'category',
        'conditions',
        'class'
    ];
}
