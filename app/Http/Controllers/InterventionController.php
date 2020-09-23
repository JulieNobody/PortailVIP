<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function listeInterventions()
	{
		$interventions = 'null';

		return view('Interventions\liste_interventions',  compact('interventions'));
    }



}
