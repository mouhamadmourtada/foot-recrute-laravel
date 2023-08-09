<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\joueur\JoueurRegisterRequest;
use App\Models\criterePhysiqueGardien;
use App\Models\criterePhysiqueJoueur;
use App\Models\Joueur;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthJoueurController extends Controller
{
    public function __construct()
    {
        $this->middleware('joueurAuth', ['except' => ['login', 'register']]);
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        $token = Auth::guard('joueur')->attempt($credentials);


        if (!$token) {
            return response()->json([
                'message' => 'credential incorrect',
            ], 401);
        }

        $user = Auth::guard('joueur')->user();



        return response()->json([
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function register(JoueurRegisterRequest $request)
    {
        $joueurData = $request->input('joueur');


        $joueur = Joueur::create([
            'email' => $joueurData['email'],
            'password' => Hash::make($joueurData['password']),
            'nomJoueur' => $joueurData['nomJoueur'],
            'prenomJoueur' => $joueurData['prenomJoueur'],
            'adresseJoueur' => $joueurData['adresseJoueur'],
            'poste' => $joueurData['poste'],
            'estGardien' => $joueurData['estGardien'],
            'centre_formation_id' => $joueurData['centre_formation_id'],
            'lieuNaissance' => $joueurData['lieuNaissance'],
            'dateNaissance' => $joueurData['dateNaissance'],
            'isValidated' => false,
        ]);


        $critereData = $request->input('critere');

        if ($joueurData['estGardien']) {
            $critere = new criterePhysiqueGardien();
            $critere->joueur_id = $joueur->id;
            $critere->saut = $critereData['saut'];
            $critere->plongeon = $critereData['plongeon'];
            $critere->arret = $critereData['arret'];
            $critere->degageemnt = $critereData['degageemnt'];
            $critere->placement = $critereData['placement'];
            $critere->reflex = $critereData['reflex'];
            $critere->save();
        } else {
            $critere = new criterePhysiqueJoueur();
            $critere->joueur_id = $joueur->id;
            $critere->vitesse = $critereData['vitesse'];
            $critere->puissance = $critereData['puissance'];
            $critere->endurance = $critereData['endurance'];
            $critere->taille = $critereData['taille'];
            $critere->controle = $critereData['controle'];
            $critere->passe = $critereData['passe'];
            $critere->tir = $critereData['tir'];
            $critere->dribble = $critereData['dribble'];
            $critere->tete = $critereData['tete'];
            $critere->piedFort = $critereData['piedFort'];
            $critere->piedGauche = $critereData['piedGauche'];
            $critere->piedDroit = $critereData['piedDroit'];
            $critere->save();
        }

        return response()->json([
            'message' => 'User created successfully',
            'user' => $joueur
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
