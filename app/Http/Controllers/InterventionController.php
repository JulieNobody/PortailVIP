<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Intervention;
use Illuminate\Http\Request;
use App\Gestion\GestionTableMotCleInterface;

class InterventionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //TODO mettre les restrictions dans les routes dans le web.php
    }



    public function listeInterventions(GestionTableMotCleInterface $GestionTableMotCleInterface)
	{

        //mise à jour de la table de mot clé intervention
        $GestionTableMotCleInterface->miseAJourTable();

        $interventions = Intervention::paginate(5);
        $utilisateurs = Utilisateur::all();

		return view('Interventions\liste_interventions',  compact('interventions','utilisateurs'));
    }



}
