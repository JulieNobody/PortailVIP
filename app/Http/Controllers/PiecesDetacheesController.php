<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Intervention;

class PiecesDetacheesController extends Controller
{
    public function get()
	{


        //TODO test à supprimer quand TableMotCle ok
        $nomClient = Auth::user()->NomUtil;
        $client = Auth::user();

        $interventions = Intervention::where('NomCmdCli', $nomClient)->get();

        $toutesInterventions = Intervention::all();




        return view('PiecesDetachees\pieces-detachees',  compact('toutesInterventions','interventions', 'nomClient', 'client'));
    }
}
