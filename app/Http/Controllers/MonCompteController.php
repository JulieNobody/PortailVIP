<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonCompteController extends Controller
{
    public function get()
	{

		return view('MonCompte\mon-compte');
    }
}
