<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DemandeInterRequest extends FormRequest
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
            'site_nom' => 'required',
            'site_libelle' => '',
            'site_adresse' => 'required',
            'site_cp' => 'required|digits_between:5,5|numeric',
            'site_ville' => 'required|max:50',
            'site_tel' => 'required',
            'site_fax' => '',
            'site_email' => 'required|email|max:50',
            'cores_info_nom' => 'required|max:50',
            'cores_info_tel' => 'required|digits:10|numeric',
            'cores_info_bis_nom' => '',
            'cores_info_bis_tel' => '',
            'secretariat_nom' => '',
            'secretariat_tel' => '',
            'app_utilisateur' => 'required|max:50',
            'app_bureau' => '',
            'app_reference_client' => '',
            'app_marque' => 'required|max:50',
            'app_no_serie' => 'required|max:50',
            'app_designation' => 'required|max:50',
            'probleme' => 'required',
            'commentaire' => '',
        ];
    }

}
