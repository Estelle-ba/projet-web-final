<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{

    protected $table = 'representative';
    protected $fillable = [
        'name',
        'lastname',
        'mail',
        'suppleant',
        'video_link',
        'description',
        'class_id',
    ];
}

