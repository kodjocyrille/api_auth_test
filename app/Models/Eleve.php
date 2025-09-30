<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom_prenom',
        'age',
        'sexe',
        'adresse',
        'telephone',
        'email',
        'date_naissance',
        'lieu_naissance',
        'matricule',
        'photo',
        'nom_session',
        'classe_id'
    ];


    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
    public function note()
    {
        return $this->hasMany(Note::class);
    }
}
