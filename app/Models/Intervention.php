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

    protected $dates = ['DateEnr'];


    public function statut()
        {
            return $this->belongsTo('App\Models\Statut', 'StatutInterv', 'Statut');
        }

    public function ligneDetail()
        {
            return $this->belongsTo('App\Models\LigneDet', 'NumInt', 'NumInt');
        }

    public function motCle()
        {
            return $this->belongsTo('App\Models\MotCle', 'id', 'id');
        }

    public function ligneDet()
        {
            return $this->hasMany('App\Models\LigneDet', 'NumInt', 'NumInt');
        }

        public function user()
        {
            return $this->hasOne('App\Models\User','NomUtil', 'NomCmdCli');
        }
}
