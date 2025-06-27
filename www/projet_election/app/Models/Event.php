<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'type_event',
        'date_beggining',
        'date_end',
        'people'
    ];
}
