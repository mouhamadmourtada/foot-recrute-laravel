<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class criterePhysiqueJoueur extends criterePhysique
{
    use HasFactory;

    public function joueur()
    {
        return $this->belongsTo(Joueur::class);
    }
}


