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
        'id_representative',
        'id_suppleant',
    ];

    // Relation vers l'utilisateur « principal »
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_representative');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

// Pour compter rapidement
    public function getVotesCountAttribute()
    {
        return $this->votes()->count();
    }

}
