<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDoc extends Model
{
    use HasFactory;





     // nom de la table
     protected $table = 't_utilisateur_doc';


     public function users()
     {
         return $this->belongsTo('App\Models\User');
     }



}
