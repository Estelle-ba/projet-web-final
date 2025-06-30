<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['user_id','representative_id'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * Le vote appartient à un représentant.
     */
    public function representative()
    {
        return $this->belongsTo(\App\Models\Representative::class);
    }

}
