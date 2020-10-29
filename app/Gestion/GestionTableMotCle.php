<?php

namespace App\Gestion;

use App\Models\Intervention;
use App\Models\MotCle;

class GestionTableMotCle implements GestionTableMotCleInterface
{

    public function miseAJourTable()
	{

        //$toutesInterventions = Intervention::all();
        $toutesInterventions = Intervention::where('motcleGen','=' ,'')->get();

        //var_dump($toutesInterventions->NumInt);

        foreach ($toutesInterventions as $i)
        {
            //$verifIdExist = MotCle::where('id',$i->id)->get();
	    //if ($verifIdExist->isEmpty())
	    if ($i->motcleGen == null || $i->motcleGen == "")
            {
                //construction de la chaine
                $chaine = null;
                $chaine =
                    $i->NomCmdCli." - ".
                    $i->NumInt." - ".
                    $i->AdLivCli." - ".
                    $i->CPLivCli." - ".
                    $i->VilleLivCli." - ".
                    $i->TypeApp." - ".
                    $i->Marque." - ".
                    $i->NumSerie." - ".
                    $i->RefDossierCli." - ".
                    $i->NomLivCli." - ".
                    $i->InterlocLivCli." - ".
                    $i->NumFacture." - ".
                    $i->RefDossierConst." - ".
                    $i->NumContrat." - ".
                    $i->CodeMarche

                ;

                //insersion de la chaine
                $i->motcleGen = $chaine;

                $i->save();
                //$MotCle = new MotCle;
                //$MotCle->id = $i->id;
                //$MotCle->Type = "INT";
                //$MotCle->mot_cle = $chaine;
                //$MotCle->save();

                //$i->motCleGen = "O";
                //$i->save();

            }
        }

    }


}
