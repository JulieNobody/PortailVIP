<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonCompteController extends Controller
{
    public function get()
	{
        $user = auth()->user();

        return view('MonCompte\mon-compte', compact('user'));
    }



}
