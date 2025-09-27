<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    protected $fillable = [
        'effectif',
        'nom_classe',
        'nombre_garcon',
        'nombre_fille',
        'classe_id'
    ];
}
