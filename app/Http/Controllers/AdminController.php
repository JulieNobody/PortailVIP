<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    public function creationGet()
	{
        // ------------- VALEURS PAR DEFAUT -------------
        $defautSocSiteVIP = "Maintronic";
        $defautCodeUtil = null;
        $defautNomUtil = null;
        $defautPassUtil = null;
        $defautAgContrat = null;              // non nullable
        $defautautomenu1 = null;
        $defautfonction = null;
        $defautDateModifPass = ""; // ------------------------------------- A FAIRE ----------------------------
        $defautLogoClient = null;
        $defautAdMailContact = null;          // non nullable
        $defautAdMailExped = null;            // non nullable
        $defautAdMailCopie = null;            // non nullable
        $defautEnvMailCloture = null;         // non nullable
        $defautDateDebEnvMail = null;
        $defautCodeCliFact = null;            // non nullable
        $defautDemIntervAffProjet = null;     // non nullable
        $defautDemIntervAgMain = null;        // non nullable
        $defautDemIntervAgTrf = null;          // non nullable
        $defautDateDebChargeSite = null;
        $defautAgPourEnvoiPieces = null;          // non nullable

        return view('Admin\admin-creation', compact(
            'defautSocSiteVIP',
            'defautCodeUtil',
            'defautNomUtil',
            'defautPassUtil',
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
            'defautCodeCliFact',
            'defautDemIntervAffProjet',
            'defautDemIntervAgMain',
            'defautDemIntervAgTrf',
            'defautDateDebChargeSite',
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
        $user->PassUtil_clair = $request->input('PassUtil');             //mot de passe en clair
        $user->PassUtil = Hash::make($request->input('PassUtil'));       //mot de passe hashé

        $acces = "00000000";
        if($request->input('voirInter') == "oui")
        {
            $acces[0] = 1;
        }
        if($request->input('demandeInter') == "oui")
        {
            $acces[1] = 1;
        }
        if($request->input('piecesDetachees') == "oui")
        {
            $acces[2] = 1;
        }
        if($request->input('demandeSupport') == "oui")
        {
            $acces[3] = 1;
        }
        if($request->input('creationActu') == "oui")
        {
            $acces[4] = 1;
        }
        if($request->input('monCompte') == "oui")
        {
            $acces[5] = 1;
        }
        if($request->input('voirFactures') == "oui")
        {
            $acces[6] = 1;
        }
        if($request->input('voirParc') == "oui")
        {
            $acces[7] = 1;
        }
        if($request->input('AdminMaintronic') == "oui")
        {
            $acces[8] = 1;
        }

        $user->Acces = $acces;

        $user->AgContrat = $request->input('AgContrat');
        $user->automenu1 = $request->input('automenu1');
        $user->fonction = $request->input('fonction');

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
        $user->CodeCliFact = $request->input('CodeCliFact');
        $user->DemIntervAffProjet = $request->input('DemIntervAffProjet');
        $user->DemIntervAgMain = $request->input('DemIntervAgMain');
        $user->DemIntervAgTrf = $request->input('DemIntervAgTrf');
        $user->DateDebChargeSite = $request->input('DateDebChargeSite');
        $user->AgPourEnvoiPieces = $request->input('AgPourEnvoiPieces');

        if($request->input('AuthDemInterv') == "oui")
        {
            $user->AuthDemInterv = "O";
        }else{
            $user->AuthDemInterv = "N";
        }
        if($request->input('AffListeProjet') == "oui")
        {
            $user->AffListeProjet = "O";
        }else{
            $user->AffListeProjet = "N";
        }
        if($request->input('ActivChargeSiteCli') == "oui")
        {
            $user->ActivChargeSiteCli = "O";
        }else{
            $user->ActivChargeSiteCli = "N";
        }
        if($request->input('AuthPlanningAssist') == "oui")
        {
            $user->AuthPlanningAssist = "O";
        }else{
            $user->AuthPlanningAssist = "N";
        }
        if($request->input('AccesDirectPlanningAssist') == "oui")
        {
            $user->AccesDirectPlanningAssist = "O";
        }else{
            $user->AccesDirectPlanningAssist = "N";
        }
        if($request->input('VuePortailGlobal') == "oui")
        {
            $user->VuePortailGlobal = "O";
        }else{
            $user->VuePortailGlobal = "N";
        }
        if($request->input('ExpressCenter') == "oui")
        {
            $user->ExpressCenter = "O";
        }else{
            $user->ExpressCenter = "N";
        }
        if($request->input('CliDemSGEpson') == "oui")
        {
            $user->CliDemSGEpson = "O";
        }else{
            $user->CliDemSGEpson = "N";
        }
        if($request->input('AffLstClassification') == "oui")
        {
            $user->AffLstClassification = "O";
        }else{
            $user->AffLstClassification = "N";
        }
        if($request->input('AffDelais') == "oui")
        {
            $user->AffDelais = "O";
        }else{
            $user->AffDelais = "N";
        }
        if($request->input('AuthCloture') == "oui")
        {
            $user->AuthCloture = "O";
        }else{
            $user->AuthCloture = "N";
        }
        if($request->input('AuthDepotDocs') == "oui")
        {
            $user->AuthDepotDocs = "O";
        }else{
            $user->AuthDepotDocs = "N";
        }
        if($request->input('AuthVisuAttCmd') == "oui")
        {
            $user->AuthVisuAttCmd = "O";
        }else{
            $user->AuthVisuAttCmd = "N";
        }
        if($request->input('AuthSwapNonEligible') == "oui")
        {
            $user->AuthSwapNonEligible = "O";
        }else{
            $user->AuthSwapNonEligible = "N";
        }
        if($request->input('AuthTransporteur') == "oui")
        {
            $user->AuthTransporteur = "O";
        }else{
            $user->AuthTransporteur = "N";
        }
        if($request->input('AuthAffSousStatut') == "oui")
        {
            $user->AuthAffSousStatut = "O";
        }else{
            $user->AuthAffSousStatut = "N";
        }


        $user->save();

        return view('Admin\admin-validation');
    }

    public function liste()
	{
        $utilisateurs = new User;

        $motcle = null;

        /*-------------- LE MOT CLÉ -------------- */
            //Si un mot clé est réclamé
            if(request()->has('valeurMotCle') && request('valeurMotCle') != null){
                $utilisateurs = $utilisateurs->where('CodeUtil', 'like', '%' . request('valeurMotCle') . '%');
                                $utilisateurs->orWhere('NomUtil', 'like', '%' . request('valeurMotCle') . '%');
                $motcle = request('valeurMotCle');
            }

            $mesFiltres = [
                'valeurMotCle' => request('valeurMotCle'),
            ];

            $utilisateurs = $utilisateurs->paginate(8)->appends($mesFiltres);

        return view('Admin\admin-liste',  compact('utilisateurs', 'motcle'));
    }


    public function modificationGet($id)
	{
        $user = user::where('id', '=', $id)->first();
        return view('Admin\admin-modification', compact('user'));
    }

    public function modificationPost(Request $request)
	{
        // ------------- CREATION USER -------------

        //récupération de l'id
        $id = $request->input('id');

        $user = user::where('id', '=', $id)->first();

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


    public function detailUser($id)
	{
        $user = user::where('id', '=', $id)->first();

        return view('Admin\admin-detail-user', compact('user'));
    }

}


