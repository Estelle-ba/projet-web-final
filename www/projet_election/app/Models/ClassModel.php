<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'class';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'place',
    ];
}
