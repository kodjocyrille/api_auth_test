<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiClasseRequest extends FormRequest
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

            'effectif'  => 'required|integer|nullable',
            'nom_classe' => 'required|string',
            'nombre_garcon' => 'required|integer|nullable',
            'nombre_fille' => 'required|integer|nullable',

        ];
    }
}
