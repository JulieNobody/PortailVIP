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



    public function listeInterventionsDefaut(GestionTableMotCleInterface $GestionTableMotCleInterface)
	{

        //mise à jour de la table de mot clé intervention
        $GestionTableMotCleInterface->miseAJourTable();


        $motcle = null;
        $encours = 'checked';


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


		return view('Interventions\liste_interventions',  compact('interventions','encours', 'motcle'));
    }



    public function listeInterventions(GestionTableMotCleInterface $GestionTableMotCleInterface)
	{

        //mise à jour de la table de mot clé intervention
        $GestionTableMotCleInterface->miseAJourTable();


        // date-min
        // date-max

        // cb-en-cours
        // cb-en-attente
        // cb-terminee

        // mot-cle



        //Récupération du nom de l'utilisateur connecté
        $username = auth()->user()->NomUtil;

        $interventions = new Intervention;
        $interventions = $interventions->where('NomCmdCli', '=', $username);

        //FILTRES
        $dateMin = null;
        $dateMax = null;
        $enCours = null;
        $enAttente = null;
        $terminee = null;
        $motcle = null;


        if(request()->isMethod('post')){

            //Si une date minimum est réclamée
            if(request()->has('date-min') && request('date-min') != null && request('date-min') != ''){
                $interventions = $interventions->where('DateEnr', '>', request('date-min'));
                $dateMin = request('date-min');
            }
            //Si une date maximum est réclamée
            if(request()->has('date-max') && request('date-max') != null && request('date-max') != ''){
                $interventions = $interventions->where('DateEnr', '<', request('date-max'));
                $dateMax = request('date-max');
            }


            //Si le statut réclamé est en cours
            if(request()->has('cb-en-cours')){
                $interventions = $interventions->whereHas('statut', function ($query) {
                                    $query->where('DesignStatutCli', 'En cours');
                                });
                $enCours = 'checked';
            }
            //Si le statut réclamé est en attente
            if(request()->has('cb-en-attente')){
                $interventions = $interventions->whereHas('statut', function ($query) {
                                    $query->where('DesignStatutCli', 'Attente de réponse au devis');
                                });
                $enAttente = 'checked';
            }
            //Si le statut réclamé est terminé
            if(request()->has('cb-terminee')){
                $interventions = $interventions->whereHas('statut', function ($query) {
                                    $query->where('DesignStatutCli', 'Terminée');
                                });
                $terminee = 'checked';
            }


            //Si un mot clé est réclamé
            if(request()->has('valeurMotCle') && request('valeurMotCle') != null){
                $interventions = $interventions->whereHas('motCle', function ($query) {
                    $query->where('mot_cle', 'like', '%' . request('valeurMotCle') . '%');
                });
                $motcle = request('valeurMotCle');
            }

        } else {

            $interventions = $interventions->whereHas('statut', function ($query) {
                                $query->where('DesignStatutCli', 'En cours');
                            });
            $enCours = 'checked';
        }



        $interventions = $interventions->paginate(8)->appends([
            'date-min' => request('date-min'),
            'date-max' => request('date-max'),
            'cb-en-cours' => request('cb-en-cours'),
            'cb-en-attente' => request('cb-en-attente'),
            'cb-terminee' => request('cb-terminee'),
            'valeurMotCle' => request('valeurMotCle'),
        ]);


		return view('Interventions\liste_interventions',  compact('interventions', 'dateMin','dateMax','enCours','enAttente','terminee','motcle'));
    }




}
