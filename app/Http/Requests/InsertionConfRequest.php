<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertionConfRequest extends FormRequest
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
            //
            'Nom' => 'required|max:100',
            'Prenom' => 'required|max:100',
            'Sexe' => 'required|max:1',
            'DateNaissance' => 'required|max:100',
            'Nationalite' => 'required|max:100'
        ];
    }
}
