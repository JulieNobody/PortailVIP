<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterMotCle extends Model
{
    use HasFactory;

        // nom de la table
        protected $table = 't_inter_mot_cle';

        //désactivation des colonnes created_at et updated_at
        public $timestamps = false;

         // id autoincremente
    public $incrementing = true;

    protected $primaryKey = 'id';
}
