<?php

namespace App\Gestion;

class TableMotCle
{


    static function extraireIntervention()
	{



        $nomClient = Auth::user()->nomUtil;

        $interventions = Intervention::where('nomCmdCli', $nomClient)->get();


    }


}
