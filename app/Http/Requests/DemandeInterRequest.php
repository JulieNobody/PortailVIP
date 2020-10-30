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
            'FaxCliDiv' => 'nullable|digits:10|numeric',
            'MailCliDiv' => 'required|email|max:70',
            'Interlocuteur' => 'required|max:70',
            'CorrespInfo' => 'required|max:100',
            'TelCorrespInfo' => 'required|digits:10|numeric',
            'CorrespInfoBis' => 'max:100',
            'TelCorrespInfoBis' => 'nullable|digits:10|numeric',
            'Secretaire' => 'max:100',
            'TelSecretaire' => 'nullable|digits:10|numeric',
            'Service' => 'max:100',
            'RefCli' => 'max:30',
            'TypeApp' => 'required|max:50',
            'Marque' => 'required|max:30',
            'NumSerie' => 'required|max:30',
            'Observ' => 'max:500',
            'Symptome' => 'required|max:500',
        ];
    }

}
