<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Image_Profile; // Assurez-vous que ce use correspond à votre namespace

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'role',
        'class_id',
        'phone_number',
        // ... autres champs
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int,string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation One-to-One vers l'image de profil.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profileImage()
    {
        return $this->hasOne(Image_Profile::class, 'user_id');
    }
}
