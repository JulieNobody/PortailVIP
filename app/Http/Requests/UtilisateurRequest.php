<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilisateurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'SocSiteVIP' => 'required|max:20',
            'CodeUtil' => 'required|max:20',
            'NomUtil' => 'required|max:35',
            'PassUtil' => 'required|max:50',
            'AgContrat' => 'required|max:4',
            'automenu1' => 'required|max:20',
            'fonction' => 'max:40',
            'LogoClient' => 'file|mimes:png,gif,jpeg',
            'AdMailContact' => 'required|max:150|email',
            'AdMailExped' => 'required|max:150|email',
            'AdMailCopie' => 'required|max:150|email',
            'EnvMailCloture' => 'required|max:20',//
            'DateDebEnvMail' => 'required|date',
            'CodeCliFact' => 'required|max:10',
            'DemIntervAffProjet' => 'required|max:30',
            'DemIntervAgMain' => 'required|max:4',
            'DemIntervAgTrf' => 'required|max:4',
            'DateDebChargeSite' => 'required|date',
            'AgPourEnvoiPieces' => 'required|max:4',

        ];
    }
}
