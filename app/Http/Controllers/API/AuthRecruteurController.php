<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\recruteur\RegisterRequest;
use App\Models\Recruteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthRecruteurController extends Controller
{

    public function __construct()
    {
        $this->middleware('recruteurAuth', ['except' => ['login', 'register']]);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        $token = Auth::guard('recruteur')->attempt($credentials);


        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $recruteur = Auth::guard('recruteur')->user();

        // if($recruteur->role != "recruteur" || !$recruteur->isValidated){
        //     Auth::logout();
        //     return response()->json([
        //         'message' => 'Unauthorized',
        //     ], 401);
        // }

        return response()->json([
            'recruteur$recruteur' => $recruteur,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function register(RegisterRequest $request)
    {

        // return response()->json([
        //     'message' => 'User created successfully',
        //     'recruteur' => $request
        // ]);
        $data = $request->validated();


        $recruteur = Recruteur::create([
            'nomRecruteur' => $data['nomRecruteur'],
            'prenomRecruteur' => $data['prenomRecruteur'],
            'adresseRecruteur' => $data['adresseRecruteur'],
            'prestige' => $data['prestige'],
            'etat' => "actif",
            'structure' => $data['structure'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'isValidated' => false,
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'recruteur' => $recruteur
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
