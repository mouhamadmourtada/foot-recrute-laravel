<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    use HasFactory;

    public function centreFormation()
    {
        return $this->belongsTo(CentreFormation::class);
    }

    public function criterePhysique()
    {
        return $this->hasOne(CriterePhysique::class);
    }
}
