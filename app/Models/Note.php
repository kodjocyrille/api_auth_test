<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'valeur',
        'nom_session',
        'eleve_id'
    ];
    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
