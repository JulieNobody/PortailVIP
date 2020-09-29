<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;

        // nom de la table
        protected $table = 't_intervention';

        //désactivation des colonnes created_at et updated_at
        public $timestamp = false;

         // id autoincremente
    public $incrementing = true;

    protected $primaryKey = 'id';
}
