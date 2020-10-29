<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserParam;
use App\Models\UserParc;

class MonCompteController extends Controller
{
    public function listParc()
    {   $motcle = null;

        $user = auth()->user();

        $Parc = new UserParc;
        $Parc = $Parc->where('CodeCliFact', '=', auth()->user()->CodeCliFact);
        $Parc = $Parc->paginate(8);

        return view('MonCompte.mon-compte', compact('user','Parc','motcle'));
    }

    public function listParcFiltres()
    {   $motcle = null;
        $user = auth()->user();

        $Parc = new UserParc;
        $Parc = $Parc->where('CodeCliFact', '=', auth()->user()->CodeCliFact);

        //Si un mot clé est réclamé
        if(request()->has('valeurMotCle') && request('valeurMotCle') != null){
            $Parc = $Parc->where('motcleGen', 'like', '%' . request('valeurMotCle') . '%');
            $motcle = request('valeurMotCle');
        }

        $mesFiltres = [
            'valeurMotCle' => request('valeurMotCle')
        ];

        $Parc = $Parc->paginate(8)->appends($mesFiltres);

        return view('MonCompte.mon-compte', compact('user','Parc','motcle'));
    }

}
