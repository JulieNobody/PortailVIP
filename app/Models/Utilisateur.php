<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{


    use HasFactory;

    // nom de la table
    protected $table = 't_utilisateur';

    //désactivation des colonnes created_at et updated_at
    public $timestamp = false;

    protected $primaryKey = 'id';

    // id autoincremente
    public $incrementing = true;

    // Format dans lequel les attributs de date seront persistés
    //protected $dateFormat
    // TODO


    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->PassUtil;
    }

}
