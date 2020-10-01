<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Intervention;
use Illuminate\Http\Request;

class InterventionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //TODO mettre les restrictions dans les routes dans le web.php
    }



    public function listeInterventions()
	{

        $interventions = Intervention::paginate(5);
        $utilisateurs = Utilisateur::all();

		return view('Interventions\liste_interventions',  compact('interventions','utilisateurs'));
    }



}
