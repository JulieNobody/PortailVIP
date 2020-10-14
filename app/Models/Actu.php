<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actu extends Model
{
    use HasFactory;

    // nom de la table
    protected $table = 't_actu';

    //désactivation des colonnes created_at et updated_at
    public $timestamps = false;

    // id autoincremente
    public $incrementing = true;

    protected $primaryKey = 'id';
}
