<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiEleveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom_prenom' => 'required|string|max:255',
            'age' => 'integer',
            'sexe' => 'required|integer',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string',
            'email' => 'required|email|unique:eleves,email',
            'matricule' => 'required|string',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'nom_session'  => 'string',
            'classe_id' => 'required|exists:classes,id'
        ];
    }
}
