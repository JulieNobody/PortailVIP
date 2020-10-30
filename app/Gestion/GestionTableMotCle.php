<?php

namespace App\Gestion;

use App\Models\Intervention;
use App\Models\MotCle;

class GestionTableMotCle implements GestionTableMotCleInterface
{

    public function miseAJourTable()
	{

        // -------------- Mot clé : intervention --------------
        $interventions = Intervention::where('motcleGen','=' ,'')->get();
        foreach ($interventions as $i)
        {
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
                //insertion de la chaine
                $i->motcleGen = $chaine;
                $i->save();
            }
        }

        // -------------- Mot clé : parc --------------
        $parc = Parc::where('motcleGen','=' ,'')->get();
        foreach ($parc as $p)
        {
	    if ($p->motcleGen == null || $p->motcleGen == "")
            {
                //construction de la chaine
                $chaine = null;
                $chaine =
                    $p->xxxxxxxx." - ".
                    $p->xxxxxxxx." - ".
                    $p->xxxxxxxx." - ".
                    $p->xxxxxxxx." - ".
                    $p->xxxxxxxx." - ".
                    $p->xxxxxxxx." - ".
                    $p->xxxxxxxx
                ;
                //insertion de la chaine
                $p->motcleGen = $chaine;
                $p->save();
            }
        }


        // -------------- Mot clé : factures --------------
        /*
        $factures = Factures::where('motcleGen','=' ,'')->get();
        foreach ($factures as $f)
        {
	    if ($f->motcleGen == null || $f->motcleGen == "")
            {
                //construction de la chaine
                $chaine = null;
                $chaine =
                    $f->xxxxxxxx." - ".
                    $f->xxxxxxxx." - ".
                    $f->xxxxxxxx." - ".
                    $f->xxxxxxxx." - ".
                    $f->xxxxxxxx." - ".
                    $f->xxxxxxxx." - ".
                    $f->xxxxxxxx." - ".
                    $f->xxxxxxxx
                ;
                //insertion de la chaine
                $f->motcleGen = $chaine;
                $f->save();
            }
        }
        */



    }


}
