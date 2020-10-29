<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CodeUtil',

        'PassUtil_hash',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'PassUtil_hash',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //désactivation des colonnes created_at et updated_at
    public $timestamps = false;


     // nom de la table
     protected $table = 't_utilisateur';



    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->PassUtil_hash;
    }



    public function param()
    {
        return $this->belongsTo('App\Models\UserParam','CodeUtil', 'CodeUtil');
    }

    public function userDoc()
    {
        return $this->hasMany('App\Models\UserDoc', 'CodeUtil', 'CodeUtil');
    }

    public function intervention()
    {
        return $this->belongsTo('App\Models\Intervention');
    }
}
