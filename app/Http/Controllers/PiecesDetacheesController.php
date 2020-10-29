<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actu;



class PiecesDetacheesController extends Controller
{
    public function get()
	{



        return view('PiecesDetachees.pieces-detachees');
    }
}


