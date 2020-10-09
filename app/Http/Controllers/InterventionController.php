<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Intervention;
use Illuminate\Http\Request;
use App\Gestion\GestionTableMotCleInterface;
use App\Models\LigneDet;

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

        //Récupération du nom de l'utilisateur connecté
        $username = auth()->user()->NomUtil;


        //Récupération des interventions concernants l'utilisateur connecté
        $interventions = Intervention::where('NomCmdCli', '=', $username)
        //Dont les interventions sont en cours
        ->whereHas('statut', function ($query) {
            $query->where('DesignStatutCli', 'En cours');
        })
        //Avec un résultat en pagination
        ->paginate(8);


		return view('Interventions\liste_interventions',  compact('interventions'));
    }



}
