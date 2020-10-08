<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function menu()
	{
        return view('Admin\admin-menu');
    }

    public function creationGet()
	{
        // ------------- VALEURS PAR DEFAUT -------------
        $defautSocSiteVIP = "Maintronic";
        $defautCodeUtil = "";
        $defautNomUtil = "";
        $defautPassUtil = "Pa$\$w0rd";
        $defautAdmin = 0;
        $defautAgContrat = "test";              // non nullable
        $defautautomenu1 = 1100000000;
        $defautfonction = null;
        $defautDateModifPass = "";
        $defautLogoClient = "logo-nasa.jpg";    //FIXME à changer
        $defautAdMailContact = "test";          // non nullable
        $defautAdMailExped = "test";            // non nullable
        $defautAdMailCopie = "test";            // non nullable
        $defautEnvMailCloture = "test";         // non nullable
        $defautDateDebEnvMail = "";            //FIXME à repasser en non nullable
        $defautAuthDemInterv = "N";
        $defautCodeCliFact = "test";            // non nullable
        $defautAffListeProjet = "T";         // non nullable
        $defautDemIntervAffProjet = "test";     // non nullable
        $defautDemIntervAgMain = "test";        // non nullable
        $defautDemIntervAgTrf = "test";          // non nullable
        $defautActivChargeSiteCli = "O";
        $defautDateDebChargeSite = "";           //FIXME à repasser en non nullable
        $defautAuthPlanningAssist = "N";
        $defautAccesDirectPlanningAssist = "N";
        $defautVuePortailGlobal = "N";
        $defautExpressCenter = "N";
        $defautCliDemSGEpson = "N";
        $defautAffLstClassification = "N";
        $defautAffDelais = "O";
        $defautAuthCloture = "N";
        $defautAuthDepotDocs = "N";
        $defautAuthVisuAttCmd = "N";
        $defautAuthSwapNonEligible = "N";
        $defautAuthTransporteur = "N";
        $defautAuthAffSousStatut = "N";
        $defautAgPourEnvoiPieces = "test";          // non nullable

        return view('Admin\admin-creation', compact(
            'defautSocSiteVIP',
            'defautCodeUtil',
            'defautNomUtil',
            'defautPassUtil',
            'defautAdmin',
            'defautAgContrat',
            'defautautomenu1',
            'defautfonction',
            'defautDateModifPass',
            'defautLogoClient',
            'defautAdMailContact',
            'defautAdMailExped',
            'defautAdMailCopie',
            'defautEnvMailCloture',
            'defautDateDebEnvMail',
            'defautAuthDemInterv',
            'defautCodeCliFact',
            'defautAffListeProjet',
            'defautDemIntervAffProjet',
            'defautDemIntervAgMain',
            'defautDemIntervAgTrf',
            'defautActivChargeSiteCli',
            'defautDateDebChargeSite',
            'defautAuthPlanningAssist',
            'defautAccesDirectPlanningAssist',
            'defautVuePortailGlobal',
            'defautExpressCenter',
            'defautCliDemSGEpson',
            'defautAffLstClassification',
            'defautAffDelais',
            'defautAuthCloture',
            'defautAuthDepotDocs',
            'defautAuthVisuAttCmd',
            'defautAuthSwapNonEligible',
            'defautAuthTransporteur',
            'defautAuthAffSousStatut',
            'defautAgPourEnvoiPieces'
        ));
    }

    public function creationPost(Request $request)
	{
        // ------------- CREATION USER -------------

        $user = new user;

        $user->SocSiteVIP = $request->input('SocSiteVIP');
        $user->CodeUtil = $request->input('CodeUtil');
        $user->NomUtil = $request->input('NomUtil');
        $user->PassUtil = Hash::make($request->input('PassUtil'));
        $user->Admin = $request->input('Admin');
        $user->AgContrat = $request->input('AgContrat');
        $user->automenu1 = $request->input('automenu1');
        $user->fonction = $request->input('fonction');
        $user->DateModifPass = $request->input('DateModifPass');

        if($request->hasFile('LogoClient'))
        {
            $file = $request->file('LogoClient');
            $extension = $file->getClientOriginalExtension();
            $fileName = $user->CodeUtil.'-'.time().'.'.$extension;
            $file->move('images/logoClient/', $fileName);
            $user->LogoClient = $fileName;
        }else{
            $user->LogoClient = null;
        }

        $user->AdMailContact = $request->input('AdMailContact');
        $user->AdMailExped = $request->input('AdMailExped');
        $user->AdMailCopie = $request->input('AdMailCopie');
        $user->EnvMailCloture = $request->input('EnvMailCloture');
        $user->DateDebEnvMail = $request->input('DateDebEnvMail');
        $user->AuthDemInterv = $request->input('AuthDemInterv');
        $user->CodeCliFact = $request->input('CodeCliFact');
        $user->AffListeProjet = $request->input('AffListeProjet');
        $user->DemIntervAffProjet = $request->input('DemIntervAffProjet');
        $user->DemIntervAgMain = $request->input('DemIntervAgMain');
        $user->DemIntervAgTrf = $request->input('DemIntervAgTrf');
        $user->ActivChargeSiteCli = $request->input('ActivChargeSiteCli');
        $user->DateDebChargeSite = $request->input('DateDebChargeSite');
        $user->AuthPlanningAssist = $request->input('AuthPlanningAssist');
        $user->AccesDirectPlanningAssist = $request->input('AccesDirectPlanningAssist');
        $user->VuePortailGlobal = $request->input('VuePortailGlobal');
        $user->ExpressCenter = $request->input('ExpressCenter');
        $user->CliDemSGEpson = $request->input('CliDemSGEpson');
        $user->AffLstClassification = $request->input('AffLstClassification');
        $user->AffDelais = $request->input('AffDelais');
        $user->AuthCloture = $request->input('AuthCloture');
        $user->AuthDepotDocs = $request->input('AuthDepotDocs');
        $user->AuthVisuAttCmd = $request->input('AuthVisuAttCmd');
        $user->AuthSwapNonEligible = $request->input('AuthSwapNonEligible');
        $user->AuthTransporteur = $request->input('AuthTransporteur');
        $user->AuthAffSousStatut = $request->input('AuthAffSousStatut');
        $user->AgPourEnvoiPieces = $request->input('AgPourEnvoiPieces');

        $user->save();

        return view('Admin\admin-validation');
    }

    public function liste()
	{
        return view('Admin\admin-liste');
    }





    public function modificationGet()
	{
        $user = user::where('CodeUtil', '=', 'Test')->first();

        // ------------- VALEURS PAR DEFAUT -------------
        $defautSocSiteVIP = $user->SocSiteVIP;
        $defautCodeUtil = $user->CodeUtil;
        $defautNomUtil = $user->NomUtil;
        $defautPassUtil = "";
        $defautAdmin = $user->Admin;
        $defautAgContrat = $user->AgContrat;
        $defautautomenu1 = $user->automenu1;
        $defautfonction = $user->fonction;
        $defautDateModifPass = $user->DateModifPass;
        $defautLogoClient = "";
        $defautAdMailContact = $user->AdMailContact;
        $defautAdMailExped = $user->AdMailExped;
        $defautAdMailCopie = $user->AdMailCopie;
        $defautEnvMailCloture = $user->EnvMailCloture;
        $defautDateDebEnvMail = $user->DateDebEnvMail;
        $defautAuthDemInterv = $user->AuthDemInterv;
        $defautCodeCliFact = $user->CodeCliFact;
        $defautAffListeProjet = $user->AffListeProjet;
        $defautDemIntervAffProjet = $user->DemIntervAffProjet;
        $defautDemIntervAgMain = $user->DemIntervAgMain;
        $defautDemIntervAgTrf = $user->DemIntervAgTrf;
        $defautActivChargeSiteCli = $user->ActivChargeSiteCli;
        $defautDateDebChargeSite = $user->DateDebChargeSite;
        $defautAuthPlanningAssist = $user->AuthPlanningAssist;
        $defautAccesDirectPlanningAssist = $user->AccesDirectPlanningAssist;
        $defautVuePortailGlobal = $user->VuePortailGlobal;
        $defautExpressCenter = $user->ExpressCenter;
        $defautCliDemSGEpson = $user->CliDemSGEpson;
        $defautAffLstClassification = $user->AffLstClassification;
        $defautAffDelais = $user->AffDelais;
        $defautAuthCloture = $user->AuthCloture;
        $defautAuthDepotDocs = $user->AuthDepotDocs;
        $defautAuthVisuAttCmd = $user->AuthVisuAttCmd;
        $defautAuthSwapNonEligible = $user->AuthSwapNonEligible;
        $defautAuthTransporteur = $user->AuthTransporteur;
        $defautAuthAffSousStatut = $user->AuthAffSousStatut;
        $defautAgPourEnvoiPieces = $user->AgPourEnvoiPieces;

        return view('Admin\admin-modification', compact(
            'defautSocSiteVIP',
            'defautCodeUtil',
            'defautNomUtil',
            'defautPassUtil',
            'defautAdmin',
            'defautAgContrat',
            'defautautomenu1',
            'defautfonction',
            'defautDateModifPass',
            'defautLogoClient',
            'defautAdMailContact',
            'defautAdMailExped',
            'defautAdMailCopie',
            'defautEnvMailCloture',
            'defautDateDebEnvMail',
            'defautAuthDemInterv',
            'defautCodeCliFact',
            'defautAffListeProjet',
            'defautDemIntervAffProjet',
            'defautDemIntervAgMain',
            'defautDemIntervAgTrf',
            'defautActivChargeSiteCli',
            'defautDateDebChargeSite',
            'defautAuthPlanningAssist',
            'defautAccesDirectPlanningAssist',
            'defautVuePortailGlobal',
            'defautExpressCenter',
            'defautCliDemSGEpson',
            'defautAffLstClassification',
            'defautAffDelais',
            'defautAuthCloture',
            'defautAuthDepotDocs',
            'defautAuthVisuAttCmd',
            'defautAuthSwapNonEligible',
            'defautAuthTransporteur',
            'defautAuthAffSousStatut',
            'defautAgPourEnvoiPieces'
        ));
    }

    public function modificationPost(Request $request)
	{
        // ------------- CREATION USER -------------

        $user = user::where('CodeUtil', '=', 'Test')->first();

        $user->SocSiteVIP = $request->input('SocSiteVIP');
        $user->CodeUtil = $request->input('CodeUtil');
        $user->NomUtil = $request->input('NomUtil');
        $user->PassUtil = Hash::make($request->input('PassUtil'));
        $user->Admin = $request->input('Admin');
        $user->AgContrat = $request->input('AgContrat');
        $user->automenu1 = $request->input('automenu1');
        $user->fonction = $request->input('fonction');
        $user->DateModifPass = $request->input('DateModifPass');

        // si pas de fichier, on laisse le logo en place
        if($request->hasFile('LogoClient'))
        {
            //suppression de l'image précédente
            $image_path = 'images/logoClient/'.$user->LogoClient;
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }

            $file = $request->file('LogoClient');
            $extension = $file->getClientOriginalExtension();
            $fileName = $user->CodeUtil.'-'.time().'.'.$extension;
            $file->move('images/logoClient/', $fileName);
            $user->LogoClient = $fileName;
        }

        $user->AdMailContact = $request->input('AdMailContact');
        $user->AdMailExped = $request->input('AdMailExped');
        $user->AdMailCopie = $request->input('AdMailCopie');
        $user->EnvMailCloture = $request->input('EnvMailCloture');
        $user->DateDebEnvMail = $request->input('DateDebEnvMail');
        $user->AuthDemInterv = $request->input('AuthDemInterv');
        $user->CodeCliFact = $request->input('CodeCliFact');
        $user->AffListeProjet = $request->input('AffListeProjet');
        $user->DemIntervAffProjet = $request->input('DemIntervAffProjet');
        $user->DemIntervAgMain = $request->input('DemIntervAgMain');
        $user->DemIntervAgTrf = $request->input('DemIntervAgTrf');
        $user->ActivChargeSiteCli = $request->input('ActivChargeSiteCli');
        $user->DateDebChargeSite = $request->input('DateDebChargeSite');
        $user->AuthPlanningAssist = $request->input('AuthPlanningAssist');
        $user->AccesDirectPlanningAssist = $request->input('AccesDirectPlanningAssist');
        $user->VuePortailGlobal = $request->input('VuePortailGlobal');
        $user->ExpressCenter = $request->input('ExpressCenter');
        $user->CliDemSGEpson = $request->input('CliDemSGEpson');
        $user->AffLstClassification = $request->input('AffLstClassification');
        $user->AffDelais = $request->input('AffDelais');
        $user->AuthCloture = $request->input('AuthCloture');
        $user->AuthDepotDocs = $request->input('AuthDepotDocs');
        $user->AuthVisuAttCmd = $request->input('AuthVisuAttCmd');
        $user->AuthSwapNonEligible = $request->input('AuthSwapNonEligible');
        $user->AuthTransporteur = $request->input('AuthTransporteur');
        $user->AuthAffSousStatut = $request->input('AuthAffSousStatut');
        $user->AgPourEnvoiPieces = $request->input('AgPourEnvoiPieces');

        $user->save();

        return view('Admin\admin-validation');
    }

}


