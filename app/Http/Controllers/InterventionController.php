<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Intervention;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function listeInterventions()
	{

        $interventions = Intervention::all();
        $utilisateurs = Utilisateur::all();

		return view('Interventions\liste_interventions',  compact('interventions','utilisateurs'));
    }



}
