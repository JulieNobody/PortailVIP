<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use HasFactory;


      // nom de la table
      protected $table = 't_statut';

      //désactivation des colonnes created_at et updated_at
      public $timestamp = false;


    public function interventions()
        {
            return $this->hasMany('App\Models\Intervention', 'StatutInterv');
        }
}
