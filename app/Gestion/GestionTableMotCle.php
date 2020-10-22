<?php

namespace App\Gestion;

use App\Models\Intervention;
use App\Models\MotCle;

class GestionTableMotCle implements GestionTableMotCleInterface
{

    public function miseAJourTable()
	{

        $toutesInterventions = Intervention::all();

        foreach ($toutesInterventions as $i)
        {
            $verifIdExist = MotCle::where('id',$i->id)->get();
            if ($verifIdExist->isEmpty())
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
                    $i->RefDossierCli
                ;

                //insersion de la chaine

                $MotCle = new MotCle;
                $MotCle->id = $i->id;
                $MotCle->Type = "INT";
                $MotCle->mot_cle = $chaine;
                $MotCle->save();
            }
        }

    }


}
