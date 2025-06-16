<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    protected $table = 'representative';
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'id_representative',
        'id_suppleant',
        'video_link',
    ];
}
