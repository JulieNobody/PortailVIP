<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserParam extends Model
{
    use HasFactory;




     // nom de la table
     protected $table = 't_paramutilisateur';


     public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
