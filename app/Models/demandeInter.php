<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demandeInter extends Model
{
    use HasFactory;


    protected $table = 't_demande_inter';

    //désactivation des colonnes created_at et updated_at
    public $timestamps = false;
    protected $primaryKey = 'id';


}
