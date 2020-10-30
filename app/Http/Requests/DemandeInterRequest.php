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
            'RaisonSocialeCliDiv' => 'required|max:60',
            'AdCliDiv' => 'required|max:500',
            'CPCliDiv' => 'required|digits:5|numeric',
            'VilleCliDiv' => 'required|max:100',
            'TelCliDiv' => 'required|digits:10|numeric',
            'FaxCliDiv' => '',
            'MailCliDiv' => 'email|max:70',
            'Interlocuteur' => 'max:70',
            'CorrespInfo' => 'max:100',
            'TelCorrespInfo' => '',
            'CorrespInfoBis' => 'max:100',
            'TelCorrespInfoBis' => '',
            'Secretaire' => 'max:100',
            'TelSecretaire' => '',
            'Service' => 'max:100',
            'RefCli' => 'required|max:30',
            'TypeApp' => 'required|max:50',
            'Marque' => 'required|max:30',
            'NumSerie' => 'required|max:30',
            'Observ' => 'required|max:500',                 //commentaire non nullable ?
            'Symptome' => 'required|max:500',
        ];
    }

}
