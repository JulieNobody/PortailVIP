<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actu;



class PiecesDetacheesController extends Controller
{
    public function get()
	{

        $actu = actu::orderBy('date', 'desc')->first();

        $message = $actu->titre." : ".$actu->resume;
        session()->flash('message',$message);

        return view('PiecesDetachees\pieces-detachees');
    }
}


