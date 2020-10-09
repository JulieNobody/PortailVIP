<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotCle extends Model
{
    use HasFactory;


    protected $table = 't_inter_mot_cle';

    //désactivation des colonnes created_at et updated_at
    public $timestamp = false;
    protected $primaryKey = 'id';



    public function intervention()
    {
        return $this->hasOne('App\Models\Intervention', 'id');
    }

}
