<?php

namespace App\Http\Controllers\recruteur;

use App\Http\Controllers\Controller;
use App\Models\Joueur;
use Illuminate\Http\Request;

class JoueurController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('recruteurAuth');
    }

    public function index()
    {
        $joueurs = Joueur::all();
        return response()->json([
            'status' => 'success',
            'joueurs' => $joueurs,
        ]);
    }



    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string|max:255',
    //     ]);

    //     $joueurs = Joueur::create([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //     ]);

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'joueurs created successfully',
    //         'joueurs' => $joueurs,
    //     ]);
    // }


    public function show($id)
    {
        $joueur = Joueur::find($id);
        return response()->json([
            'status' => 'success',
            'joueur' => $joueur,
        ]);
    }

}
