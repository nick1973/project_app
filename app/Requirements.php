<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirements extends Model
{
    protected $fillable = [
        'project_id', 'name', 'requirements', 'process', 'url', 'tested_by', 'passed', 'bugs', 'aesthetic', 'wish_list', 'developed'
    ];

}
