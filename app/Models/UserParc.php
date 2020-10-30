<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserParc extends Model
{
    use HasFactory;

    //désactivation des colonnes created_at et updated_at
    public $timestamps = false;

    // nom de la table
    protected $table = 't_parc';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'CodeCliFact');
    }


}
