<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    // si votre table s’appelle au pluriel 'representatives', décommentez :
    // protected $table = 'representative';
    protected $table = 'representative';
    protected $fillable = [
        'name',
        'lastname',
        'mail',
        'suppleant',
        'video_link',
        'class_id',
    ];
}

