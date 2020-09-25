<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PiecesDetacheesController extends Controller
{
    public function get()
	{

		return view('PiecesDetachees\pieces-detachees');
    }
}
