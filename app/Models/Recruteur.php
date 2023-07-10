<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomRecruteur',
        'prenomRecruteur',
        'adresseRecruteur',
        'mailRecruteur',
        'prestige',
        'estValide',
        'etat',
        'structure',
    ];

    public function joueurs()
    {
        return $this->belongsToMany(Joueur::class, 'recruteur_joueur');
    }
}
