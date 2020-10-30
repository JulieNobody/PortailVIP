<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserParam;
use App\Models\UserParc;

class MonCompteController extends Controller
{
    public function listParc()
    {   $motcle = null;
        $cssParc = "";
        $voirPlus = "display: contents!important";
        $cssLinks = "display: none!important";
        $cssImgParc = "close";

        $user = auth()->user();

        $Parc = new UserParc;
        $Parc = $Parc->where('CodeCliFact', '=', auth()->user()->CodeCliFact);
        $Parc = $Parc->paginate(10)->fragment('monParc');

        return view('MonCompte.mon-compte', compact('user','Parc','motcle','cssParc','cssImgParc', 'cssLinks','voirPlus'));
    }

    public function listParcFiltres()
    {   $motcle = null;
        $cssParc = "display: contents!important";
        $voirPlus = "display: none!important";
        $cssLinks = "display: contents!important";
        $cssImgParc = "open";

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

        $Parc = $Parc->paginate(10)->appends($mesFiltres)->fragment('monParc');

        return view('MonCompte.mon-compte', compact('user','Parc','motcle','cssParc','cssImgParc', 'cssLinks','voirPlus'));
    }



    public function detailParc ($id)
    {
        $parc = UserParc::where('id', '=', $id)->first();

        return view('MonCompte.detail_parc', compact('parc'));
    }

}
