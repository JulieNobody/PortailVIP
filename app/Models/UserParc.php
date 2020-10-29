<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserParc extends Model
{
    use HasFactory;


    // nom de la table
    protected $table = 't_parc';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'CodeCliFact');
    }


}
