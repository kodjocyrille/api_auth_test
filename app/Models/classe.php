<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = [
        'effectif',
        'nom_classe',
        'nombre_garcon',
        'nombre_fille',

    ];

    public function eleves()
    {
        return $this->hasMany(Eleve::class);
    }
}
