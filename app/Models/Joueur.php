<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Joueur extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    public function centreFormation()
    {
        return $this->belongsTo(CentreFormation::class);
    }

    public function criterePhysique()
    {
        return $this->hasOne(CriterePhysique::class);
    }

    public function recruteurs()
    {
        return $this->belongsToMany(Recruteur::class, 'recruteur_joueur');
    }


    protected $fillable = [
        'nomJoueur',
        'prenomJoueur',
        'adresseJoueur',
        'email',
        'estGardien',
        'etat',
        'poste',
        'password',
        'isValidated',
        'lieuNaissance',
        'dateNaissance',
        'centre_formation_id'
    ];


     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
