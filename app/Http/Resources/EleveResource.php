<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EleveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nom_prenom" => $this->nom_prenom,
            'age' => $this->age,
            'sexe' => $this->sexe,
            'adresse' => $this->adresse,
            'telephone' => $this->telephone,
            'email' => $this->email,
            'date_naissance' => $this->date_naissance,
            'lieu_naissance' => $this->date_naissance,
            'matricule' => $this->matricule,
            'photo' => $this->photo,
            'nom_session' => $this->nom_session,
            'classe_id' => $this->classe_id,
        ];
    }
}
