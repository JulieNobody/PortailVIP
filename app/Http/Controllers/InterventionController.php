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

        // LES FILTRES
        $dateMin = null;
        $dateMax = null;
        $enCours = null;
        $enAttente = null;
        $terminee = null;
        $motcle = null;

        //Récupération du nom de l'utilisateur connecté
        $username = auth()->user()->NomUtil;

        /*-------------- DÉBUT DE LA REQUÊTE -------------- */

        //Récupération de toutes les interventions concernants l'utilisateur connecté
        $interventions = new Intervention;
        $interventions = $interventions->where('NomCmdCli', '=', $username);

        // je renvoie une séléction d'interventions filtrées par défaut avec le statut 'En cours'
        $interventions = $interventions->whereHas('statut', function ($query) {
            $query->where('DesignStatutCli', 'En cours');
        });

        $enCours = 'checked';

        $interventions = $interventions->paginate(8);

		return view('Interventions\liste_interventions',  compact('interventions', 'dateMin','dateMax','enCours','enAttente','terminee','motcle'));
    }


    public function listeInterventionsFiltrees()
	{
        // LES FILTRES
        $dateMin = null;
        $dateMax = null;
        $enCours = null;
        $enAttente = null;
        $terminee = null;
        $motcle = null;

        //Récupération du nom de l'utilisateur connecté
        $username = auth()->user()->NomUtil;


        /*-------------- DÉBUT DE LA REQUÊTE -------------- */

        //Récupération de toutes les interventions concernants l'utilisateur connecté
        $interventions = new Intervention;
        $interventions = $interventions->where('NomCmdCli', '=', $username);


            /*-------------- LES DATES -------------- */
            //Si une date minimum est réclamée
            if(request()->has('date-min') && request('date-min') != null && request('date-min') != ''){
                $interventions = $interventions->where('DateEnr', '>=', request('date-min'));
                $dateMin = request('date-min');
            }
            //Si une date maximum est réclamée
            if(request()->has('date-max') && request('date-max') != null && request('date-max') != ''){
                $interventions = $interventions->where('DateEnr', '<=', request('date-max'));
                $dateMax = request('date-max');
            }


            /*-------------- LES CHECKBOX -------------- */

            if(request()->has('cb-en-cours')||request()->has('cb-en-attente')||request()->has('cb-terminee')){

                $interventions = $interventions->whereHas('statut', function ($query) {

                    /**
                     * Je pars d'une sélection où il n'y a aucun résultat.
                     * Puis, je rajoute les query en fonction de la checkbox cochée.
                     * */
                    $query->where('DesignStatutCli', '');

                    //Si le statut réclamé est en cours
                    if(request()->has('cb-en-cours')){
                        $query->orWhere('DesignStatutCli', 'En cours');
                    }
                    //Si le statut réclamé est en attente
                    if(request()->has('cb-en-attente')){
                        $query->orWhere('DesignStatutCli', 'Attente de réponse au devis');
                    }
                    //Si le statut réclamé est terminé
                    if(request()->has('cb-terminee')){
                        $query->orWhere('DesignStatutCli', 'Terminée');
                    }
                });

                /**
                 * Je renvoie à ma vue quelles cases doivent rester cochées après l'actualisation de la page
                 * */
                if(request()->has('cb-en-cours')){
                    $enCours = 'checked';
                }
                if(request()->has('cb-en-attente')){
                    $enAttente = 'checked';
                }
                if(request()->has('cb-terminee')){
                    $terminee = 'checked';
                }

            }


            /*-------------- LE MOT CLÉ -------------- */
            //Si un mot clé est réclamé
            if(request()->has('valeurMotCle') && request('valeurMotCle') != null){
                $interventions = $interventions->whereHas('motCle', function ($query) {
                    $query->where('mot_cle', 'like', '%' . request('valeurMotCle') . '%');
                });
                $motcle = request('valeurMotCle');
            }

        $mesFiltres = [
            'date-min' => request('date-min'),
            'date-max' => request('date-max'),
            'cb-en-cours' => request('cb-en-cours'),
            'cb-en-attente' => request('cb-en-attente'),
            'cb-terminee' => request('cb-terminee'),
            'valeurMotCle' => request('valeurMotCle'),
        ];

        $interventions = $interventions->paginate(8)->appends($mesFiltres);

		return view('Interventions\liste_interventions',  compact('interventions', 'dateMin','dateMax','enCours','enAttente','terminee','motcle'));
    }



}
