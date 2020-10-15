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


