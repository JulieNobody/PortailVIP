<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Utilisateur;
use App\Models\Intervention;
use Illuminate\Http\Request;
use App\Gestion\GestionTableMotCleInterface;
use App\Models\LigneDet;
use App\Models\UserParam;
use App\Models\User;
use Exception;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\demandeInter;
use App\Http\Requests\DemandeInterRequest;

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

        //Récupération de la date du jour
        $today = Carbon::now();

        //Récupération du nom de l'utilisateur connecté
        $username = auth()->user()->NomUtil;

        /*-------------- DÉBUT DE LA REQUÊTE -------------- */


        //Récupération de toutes les interventions concernants l'utilisateur connecté
        $interventions = new Intervention;

        if(auth()->user()->Acces[8] != 1){

            $interventions = $interventions->where('NomCmdCli', '=', $username);

            //Je check si l'utilisateur connecté est associé à un nom de projet défini.
            try {
                $nomProjet = auth()->user()->param->NomProjet;

                if ($nomProjet != null){
                    $interventions = $interventions->where('NomProjet','=',$nomProjet);
                };

              } catch (\Exception $e) {
              }


        }


        // je renvoie une séléction d'interventions filtrées par défaut avec le statut 'En cours'
        $interventions = $interventions->whereHas('statut', function ($query) {
            $query->where('DesignStatutCli', 'En cours');
        });

        $enCours = 'checked';

        $interventions = $interventions->orderBy('DateEnr', 'DESC')->paginate(15);

		return view('Interventions.liste_interventions',  compact('interventions', 'dateMin','dateMax','enCours','enAttente','terminee','motcle','today'));
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

        //Récupération de la date du jour
        $today = Carbon::now();

        //Récupération du nom de l'utilisateur connecté
        $username = auth()->user()->NomUtil;

        /*-------------- DÉBUT DE LA REQUÊTE -------------- */

        //Récupération de toutes les interventions concernants l'utilisateur connecté
        $interventions = new Intervention;

        if(auth()->user()->Acces[8] != 1){
            $interventions = $interventions->where('NomCmdCli', '=', $username);


             //Je check si l'utilisateur connecté est associé à un nom de projet défini.
             try {
                $nomProjet = auth()->user()->param->NomProjet;

                if ($nomProjet != null){
                    $interventions = $interventions->where('NomProjet','=',$nomProjet);
                };

              } catch (\Exception $e) {
              }


        }


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
            //if(request()->has('valeurMotCle') && request('valeurMotCle') != null){
            //    $interventions = $interventions->whereHas('motCle', function ($query) {
            //        $query->where('mot_cle', 'like', '%' . request('valeurMotCle') . '%');
            //    });
            //    $motcle = request('valeurMotCle');
            //}

          /*-------------- LE MOT CLÉ -------------- */
            //Si un mot clé est réclamé
            if(request()->has('valeurMotCle') && request('valeurMotCle') != null){
                $interventions = $interventions->where('motcleGen', 'like', '%' . request('valeurMotCle') . '%');
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

        $interventions = $interventions->orderBy('DateEnr', 'DESC')->paginate(15)->appends($mesFiltres);

		return view('Interventions.liste_interventions',  compact('interventions', 'dateMin','dateMax','enCours','enAttente','terminee','motcle','today'));
    }

    public function detailIntervention ($id)
    {
        $intervention = Intervention::where('id', '=', $id)->first();

        return view('Interventions.detail_intervention', compact('intervention'));
    }




    public function demandeInterventionGet ()
    {
        if(auth()->user()->Acces[8] == 1){
            $listeAdresse = Intervention::all()->pluck('NomLivCli','id');
        }
        else{
            $listeAdresse = Intervention::where('NomCmdCli', '=', auth()->user()->NomUtil)->pluck('NomLivCli','id');
            //Je check si l'utilisateur connecté est associé à un nom de projet défini.
            try {
                $nomProjet = auth()->user()->param->NomProjet;

                if ($nomProjet != null){
                    $listeAdresse = Intervention::where('NomProjet','=',$nomProjet)->pluck('NomLivCli','id');
                };

            } catch (\Exception $e) {
            }
        }

        $listeAdresse->prepend('Sélectionnez un site', '0');


        return view('Interventions.demande_intervention', compact('listeAdresse'));
    }

    public function getInterventionSite(Request $request){

        $id = $request->idVille;
        $inter = Intervention::where('id', '=', $id)->first();

        return response()->json(array('inter'=>$inter));
    }


    public function demandeInterventionPost (DemandeInterRequest $request)
    {
        $user = auth()->user();

        // ------------- CREATION INTERVENTION -------------
        $demande_intervention = new demandeInter;

        //parametrage de la façade Carbon en local
        Carbon::setLocale('fr');

        // ######## données hors formulaire ########
        $demande_intervention->DateSrv = Carbon::now();
        $demande_intervention->HeureSrv = carbon::now();                         //FIXME : mauvaise heure, voir fuseau horaire
        $demande_intervention->IP = $request->ip();                              // FIXME : A TESTER EN PROD
        $demande_intervention->CodeUtilCliCompte = $user->CodeUtil;
        $demande_intervention->CodeCli = $user->CodeUtil;
        //non traité
        $demande_intervention->libCourt = null;
        $demande_intervention->DateDebGar = Carbon::createFromDate('0000', '01', '01', 'Europe/Paris');
        $demande_intervention->DateFinGar = Carbon::createFromDate('0000', '01', '01', 'Europe/Paris');
        $demande_intervention->DemSwap = null;
        $demande_intervention->Classification = null;
        $demande_intervention->NumInt = 'M0000';
        $demande_intervention->ArtCode = null;
        $demande_intervention->CodeDefaut = null;
        $demande_intervention->CodeDelai = null;
        $demande_intervention->InterlocConcerne = null;

        // ######## donnée via formulaire ########
        $demande_intervention->RaisonSocialeCliDiv = $request->input('RaisonSocialeCliDiv');
        $demande_intervention->AdCliDiv = $request->input('AdCliDiv');
        $demande_intervention->CPCliDiv = $request->input('CPCliDiv');
        $demande_intervention->VilleCliDiv = $request->input('VilleCliDiv');
        $demande_intervention->TelCliDiv = $request->input('TelCliDiv');
        $demande_intervention->FaxCliDiv = $request->input('FaxCliDiv');
        $demande_intervention->MailCliDiv = $request->input('MailCliDiv');
        $demande_intervention->Interlocuteur = $request->input('Interlocuteur');
        $demande_intervention->CorrespInfo = $request->input('CorrespInfo');
        $demande_intervention->TelCorrespInfo = $request->input('TelCorrespInfo');
        $demande_intervention->CorrespInfoBis = $request->input('CorrespInfoBis');
        $demande_intervention->TelCorrespInfoBis = $request->input('TelCorrespInfoBis');
        $demande_intervention->Secretaire = $request->input('Secretaire');
        $demande_intervention->TelSecretaire = $request->input('TelSecretaire');
        $demande_intervention->Service = $request->input('Service');

        if($request->input('RefCli') == null)
        {
            $demande_intervention->RefCli = ' ';
        }else{
            $demande_intervention->RefCli = $request->input('RefCli');
        }

        $demande_intervention->TypeApp = $request->input('TypeApp');
        $demande_intervention->Marque = $request->input('Marque');
        $demande_intervention->NumSerie = $request->input('NumSerie');

        if($request->input('Observ') == null)
        {
            $demande_intervention->Observ = ' ';
            $demande_intervention->Comment = ' ';
        }else{
            $demande_intervention->Observ = $request->input('Observ');
            $demande_intervention->Comment = $request->input('Observ');
        }

        $demande_intervention->Symptome = $request->input('Symptome');

        $demande_intervention->save();

        return view('pop-up_validation');
    }

}
