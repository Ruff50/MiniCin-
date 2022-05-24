<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    use HasFactory;

    public function salle()
    {
        return $this->belongsTo(Salles::class, 'salles_id');
    }
    public function realisateur()
    {
        return $this->belongsTo(Réalisateur::class, 'realisateurs_id');
    }
}
