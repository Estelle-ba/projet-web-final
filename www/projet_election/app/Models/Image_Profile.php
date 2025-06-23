<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image_Profile extends Model
{
    use HasFactory;
    protected $table = 'image_profiles';
    protected $fillable = [
        'image',
        'user_id',
    ];
}
