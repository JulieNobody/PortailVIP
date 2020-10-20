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

		return view('Interventions\liste_interventions',  compact('interventions', 'dateMin','dateMax','enCours','enAttente','terminee','motcle','today'));
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

        $interventions = $interventions->orderBy('DateEnr', 'DESC')->paginate(15)->appends($mesFiltres);

		return view('Interventions\liste_interventions',  compact('interventions', 'dateMin','dateMax','enCours','enAttente','terminee','motcle','today'));
    }

    public function detailIntervention ($id)
    {
        $intervention = Intervention::where('id', '=', $id)->first();

        return view('Interventions\detail_intervention', compact('intervention'));
    }

    public function demandeInterventionGet ()
    {

        $user = auth()->user();

        /*  Liste des champs pour une Intervention
        NumInt
        CodeUtilSuivContrat
        NumIntTrf
        TypeInt
        NomLivCli
        TypeLivCli
        AdLivCli
        CPLivCli
        VilleLivCli
        InterlocLivCli
        TelLivCli
        FaxLivCli
        CodeComptaCliLiv
        NomFactCli
        AdFactCli
        CPFactCli
        VilleFactCli
        InterlocFactCli
        TelFactCli
        FaxFactCli
        CodeComptaCliFact
        NomCmdCli
        CPCmdCli
        CodeComptaCliCmd
        DateEnr
        HeureEnr
        Observ
        TitreDetailTech
        DetailTech
        TypeApp
        AppClassification
        Marque
        LieuInt
        NumSerie
        LivCliFinal
        DateFinSG
        RefDossierCli
        RefDossierConst
        NumContrat
        NomProjet
        CodeMarche
        CondEnt
        ModeSortie
        ModeEntree
        DateIntPrevu
        HeureIntPrevu
        DateAppelClient
        HeureAppelClient
        DateExpDevis
        HeureExpDevis
        AccordDevis
        DateAccRef
        HeureAccRef
        DatePret
        HeurePret
        NumSeriePret
        TypeAppPret
        DateRetourPret
        HeureRetourPret
        RefusPret
        NomTech
        DateDebInterv
        HeureDebInterv
        DateFinInterv
        HeureFinInterv
        DateSortie
        HeureSortie
        DateModif
        HeureModif
        NumFacture
        DateFacture
        HeureFacture
        StatutInterv
        NomStatutInterv
        SousStatutInterv
        DateExport
        HeureExport
        InfoDelai1
        InfoDelai2
        */


        $defautNumInt = "";
        $defautCodeUtilSuivContrat = "";
        $defautNumIntTrf = "";
        $defautTypeInt = "";
        $defautNomLivCli = "";
        $defautTypeLivCli = "";
        $defautAdLivCli = "";
        $defautCPLivCli = "";
        $defautVilleLivCli = "";
        $defautInterlocLivCli = "";
        $defautTelLivCli = "";
        $defautFaxLivCli = "";
        $defautCodeComptaCliLiv = "";
        $defautNomFactCli = "";
        $defautAdFactCli = "";
        $defautCPFactCli = "";
        $defautVilleFactCli = "";
        $defautInterlocFactCli = "";
        $defautTelFactCli = "";
        $defautFaxFactCli = "";
        $defautCodeComptaCliFact = "";
        $defautNomCmdCli = "";
        $defautCPCmdCli = "";
        $defautCodeComptaCliCmd = "";
        $defautDateEnr  = "";
        $defautHeureEnr = "";
        $defautObserv = "";
        $defautTitreDetailTech = "";
        $defautDetailTech = "";
        $defautTypeApp = "";
        $defautAppClassification = "";
        $defautMarque = "";
        $defautLieuInt = "";
        $defautNumSerie  = "";
        $defautLivCliFinal = "";
        $defautDateFinSG = "";
        $defautRefDossierCli  = "";
        $defautRefDossierConst = "";
        $defautNumContrat = "";
        $defautNomProjet = "";
        $defautCodeMarche = "";
        $defautCondEnt  = "";
        $defautModeSortie = "";
        $defautModeEntree = "";
        $defautDateIntPrevu  = "";
        $defautHeureIntPrevu  = "";
        $defautDateAppelClient  = "";
        $defautHeureAppelClient = "";
        $defautDateExpDevis = "";
        $defautHeureExpDevis = "";
        $defautAccordDevis = "";
        $defautDateAccRef = "";
        $defautHeureAccRef = "";
        $defautDatePret = "";
        $defautHeurePret = "";
        $defautNumSeriePret = "";
        $defautTypeAppPret = "";
        $defautDateRetourPret = "";
        $defautHeureRetourPret = "";
        $defautRefusPret = "";
        $defautNomTech = "";
        $defautDateDebInterv = "";
        $defautHeureDebInterv = "";
        $defautDateFinInterv  = "";
        $defautHeureFinInterv = "";
        $defautDateSortie = "";
        $defautHeureSortie = "";
        $defautDateModif = "";
        $defautHeureModif = "";
        $defautNumFacture = "";
        $defautDateFacture = "";
        $defautHeureFacture = "";
        $defautStatutInterv  = "";
        $defautNomStatutInterv = "";
        $defautSousStatutInterv  = "";
        $defautDateExport = "";
        $defautHeureExport = "";
        $defautInfoDelai1 = "";
        $defautInfoDelai2 = "";

        return view('Interventions\demande_intervention', compact(
            'user',
            'defautNumInt',
            'defaut$defautCodeUtilSuivContrat',
            'defautNumIntTrf',
            'defautTypeInt',
            'defautNomLivCli',
            'defautTypeLivCli',
            'defautAdLivCli',
            'defautCPLivCli',
            'defautVilleLivCli',
            'defautInterlocLivCli',
            'defautTelLivCli',
            'defautFaxLivCli',
            'defautCodeComptaCliLiv',
            'defautNomFactCli',
            'defautAdFactCli',
            'defautCPFactCli',
            'defautVilleFactCli',
            'defautInterlocFactCli',
            'defautTelFactCli',
            'defautFaxFactCli',
            'defautCodeComptaCliFact',
            'defautNomCmdCli',
            'defautCPCmdCli',
            'defautCodeComptaCliCmd',
            'defautDateEnr ',
            'defautHeureEnr',
            'defautObserv',
            'defautTitreDetailTech',
            'defautDetailTech',
            'defautTypeApp',
            'defautAppClassification',
            'defautMarque',
            'defautLieuInt',
            'defautNumSerie ',
            'defautLivCliFinal',
            'defautDateFinSG',
            'defautRefDossierCli ',
            'defautRefDossierConst',
            'defautNumContrat',
            'defautNomProjet',
            'defautCodeMarche',
            'defautCondEnt ',
            'defautModeSortie',
            'defautModeEntree',
            'defautDateIntPrevu ',
            'defautHeureIntPrevu ',
            'defautDateAppelClient ',
            'defautHeureAppelClient',
            'defautDateExpDevis',
            'defautHeureExpDevis',
            'defautAccordDevis',
            'defautDateAccRef',
            'defautHeureAccRef',
            'defautDatePret',
            'defautHeurePret',
            'defautNumSeriePret',
            'defautTypeAppPret',
            'defautDateRetourPret',
            'defautHeureRetourPret',
            'defautRefusPret',
            'defautNomTech',
            'defautDateDebInterv',
            'defautHeureDebInterv',
            'defautDateFinInterv ',
            'defautHeureFinInterv',
            'defautDateSortie',
            'defautHeureSortie',
            'defautDateModif',
            'defautHeureModif',
            'defautNumFacture',
            'defautDateFacture',
            'defautHeureFacture',
            'defautStatutInterv ',
            'defautNomStatutInterv',
            'defautSousStatutInterv ',
            'defautDateExport',
            'defautHeureExport',
            'defautInfoDelai1',
            'defautInfoDelai2',
        ));
    }

    public function demandeInterventionPost (Request $request)
    {


        // ------------- CREATION INTERVENTION -------------
        $intervention = new intervention;

        $intervention->NumInt = $request->input('NumInt');
        $intervention->CodeUtilSuivContrat = $request->input('CodeUtilSuivContrat');
        $intervention->NumIntTrf = $request->input('NumIntTrf');
        $intervention->TypeInt = $request->input('TypeInt');
        $intervention->NomLivCli = $request->input('NomLivCli');
        $intervention->TypeLivCli = $request->input('TypeLivCli');
        $intervention->AdLivCli = $request->input('AdLivCli');
        $intervention->CPLivCli = $request->input('CPLivCli');
        $intervention->VilleLivCli = $request->input('VilleLivCli');
        $intervention->InterlocLivCli = $request->input('InterlocLivCli');
        $intervention->TelLivCli = $request->input('TelLivCli');
        $intervention->FaxLivCli = $request->input('FaxLivCli');
        $intervention->CodeComptaCliLiv = $request->input('CodeComptaCliLiv');
        $intervention->NomFactCli = $request->input('NomFactCli');
        $intervention->AdFactCli = $request->input('AdFactCli');
        $intervention->CPFactCli = $request->input('CPFactCli');
        $intervention->VilleFactCli = $request->input('VilleFactCli');
        $intervention->InterlocFactCli = $request->input('InterlocFactCli');
        $intervention->TelFactCli = $request->input('TelFactCli');
        $intervention->FaxFactCli = $request->input('FaxFactCli');
        $intervention->CodeComptaCliFact = $request->input('CodeComptaCliFact');
        $intervention->NomCmdCli = $request->input('NomCmdCli');
        $intervention->CPCmdCli = $request->input('CPCmdCli');
        $intervention->CodeComptaCliCmd = $request->input('CodeComptaCliCmd');
        $intervention->DateEnr  = $request->input('DateEnr');
        $intervention->HeureEnr = $request->input('HeureEnr');
        $intervention->Observ = $request->input('Observ');
        $intervention->TitreDetailTech = $request->input('TitreDetailTech');
        $intervention->DetailTech = $request->input('DetailTech');
        $intervention->TypeApp = $request->input('TypeApp');
        $intervention->AppClassification = $request->input('AppClassification');
        $intervention->Marque = $request->input('Marque');
        $intervention->LieuInt = $request->input('LieuInt');
        $intervention->NumSerie  = $request->input('NumSerie');
        $intervention->LivCliFinal = $request->input('LivCliFinal');
        $intervention->DateFinSG = $request->input('DateFinSG');
        $intervention->RefDossierCli  = $request->input('RefDossierCli');
        $intervention->RefDossierConst = $request->input('RefDossierConst');
        $intervention->NumContrat = $request->input('NumContrat');
        $intervention->NomProjet = $request->input('NomProjet');
        $intervention->CodeMarche = $request->input('CodeMarche');
        $intervention->CondEnt  = $request->input('CondEnt');
        $intervention->ModeSortie = $request->input('ModeSortie');
        $intervention->ModeEntree = $request->input('ModeEntree');
        $intervention->DateIntPrevu  = $request->input('DateIntPrevu');
        $intervention->HeureIntPrevu  = $request->input('HeureIntPrevu');
        $intervention->DateAppelClient  = $request->input('DateAppelClient');
        $intervention->HeureAppelClient = $request->input('HeureAppelClient');
        $intervention->DateExpDevis = $request->input('DateExpDevis');
        $intervention->HeureExpDevis = $request->input('HeureExpDevis');
        $intervention->AccordDevis = $request->input('AccordDevis');
        $intervention->DateAccRef = $request->input('DateAccRef');
        $intervention->HeureAccRef = $request->input('HeureAccRef');
        $intervention->DatePret = $request->input('DatePret');
        $intervention->HeurePret = $request->input('HeurePret');
        $intervention->NumSeriePret = $request->input('NumSeriePret');
        $intervention->TypeAppPret = $request->input('TypeAppPret');
        $intervention->DateRetourPret = $request->input('DateRetourPret');
        $intervention->HeureRetourPret = $request->input('HeureRetourPret');
        $intervention->RefusPret = $request->input('RefusPret');
        $intervention->NomTech = $request->input('NomTech');
        $intervention->DateDebInterv = $request->input('DateDebInterv');
        $intervention->HeureDebInterv = $request->input('HeureDebInterv');
        $intervention->DateFinInterv  = $request->input('DateFinInterv');
        $intervention->HeureFinInterv = $request->input('HeureFinInterv');
        $intervention->DateSortie = $request->input('DateSortie');
        $intervention->HeureSortie = $request->input('HeureSortie');
        $intervention->DateModif = $request->input('DateModif');
        $intervention->HeureModif = $request->input('HeureModif');
        $intervention->NumFacture = $request->input('NumFacture');
        $intervention->DateFacture = $request->input('DateFacture');
        $intervention->HeureFacture = $request->input('HeureFacture');
        $intervention->StatutInterv  = $request->input('StatutInterv');
        $intervention->NomStatutInterv = $request->input('NomStatutInterv');
        $intervention->SousStatutInterv  = $request->input('SousStatutInterv');
        $intervention->DateExport = $request->input('DateExport');
        $intervention->HeureExport = $request->input('HeureExport');
        $intervention->InfoDelai1 = $request->input('InfoDelai1');
        $intervention->InfoDelai2 = $request->input('InfoDelai2');


        $intervention->save();

        return view('Admin\admin-validation');
    }

}
