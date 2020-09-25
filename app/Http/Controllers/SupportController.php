<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function get()
	{

		return view('Support\support');
    }
}
