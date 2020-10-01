<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Intervention;
use App\Models\InterMotCle;
use App\Models\Utilisateur;


class PiecesDetacheesController extends Controller
{
    public function get()
	{


        //TODO test à supprimer quand TableMotCle ok

        //test affichage
        $nomClient = Auth::user()->NomUtil;
        $client = Auth::user();

        $interventions = Intervention::where('NomCmdCli', $nomClient)->get();
        $test = InterMotCle::where('id', '2')->get();


        //test remplissage table "mot cle"

        $toutesInterventions = Intervention::all();

        foreach ($toutesInterventions as $i)
        {
            $verifIdExist = InterMotCle::where('id',$i->id)->get();
            if ($verifIdExist->isEmpty())
            {
                //construction de la chaine
                $chaine = null;
                $chaine = $i->RefDossierCli;
                $chaine = $chaine." - ".$i->StatutInterv;
                $chaine = $chaine." - ".$i->VilleLivCli;

                //insersion de la chaine

                $interMotCle = new InterMotCle;
                $interMotCle->id = $i->id;
                $interMotCle->mot_cle = $chaine;
                $interMotCle->save();
            }
        }


        return view('PiecesDetachees\pieces-detachees',
            compact(
                'toutesInterventions',
                'interventions',
                'nomClient',
                'client',
                'test'
            ));
    }
}
