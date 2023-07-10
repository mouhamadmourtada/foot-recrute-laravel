<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class criterePhysique extends Model
{
    use HasFactory;

    // public function criterephysiquable()
    // {
    //     return $this->morphTo();
    // }

    public function joueur()
    {
        return $this->belongsTo(Joueur::class);
    }
}
