<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Recruteur;
use Illuminate\Http\Request;

class RecruteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['recruteurs'] = Recruteur::orderBy('id', 'desc')->paginate(5);
        return view('admin.recruteur.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.recruteur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomRecruteur' => 'required',
            'prenomRecruteur' => 'required',
            'adresseRecruteur' => 'required',
            'mailRecruteur' => 'required',
            'prestige' => 'required|numeric|min:1|max:10',
            'estValide' => 'required|boolean',
            'etat' => 'required|in:actif,inactif',
            'structure' => 'required',
        ]);

        $recruteur = new Recruteur;
        $recruteur->nomRecruteur = $request->nomRecruteur;
        $recruteur->prenomRecruteur = $request->prenomRecruteur;
        $recruteur->adresseRecruteur = $request->adresseRecruteur;
        $recruteur->mailRecruteur = $request->mailRecruteur;
        $recruteur->prestige = $request->prestige;
        $recruteur->estValide = $request->estValide;
        $recruteur->etat = $request->etat;
        $recruteur->structure = $request->structure;
        $recruteur->save();

        return redirect()->route('admin.recruteur.index')
            ->with('success', 'Recruteur créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recruteur  $recruteur
     * @return \Illuminate\Http\Response
     */
    public function show(Recruteur $recruteur)
    {
        return view('admin.recruteur.show', compact('recruteur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recruteur  $recruteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Recruteur $recruteur)
    {
        return view('admin.recruteur.edit', compact('recruteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recruteur  $recruteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recruteur $recruteur)
    {
        $request->validate([
            'nomRecruteur' => 'required',
            'prenomRecruteur' => 'required',
            'adresseRecruteur' => 'required',
            'mailRecruteur' => 'required',
            'prestige' => 'required|numeric|min:1|max:10',
            'estValide' => 'required|boolean',
            'etat' => 'required|in:actif,inactif',
            'structure' => 'required',
        ]);

        $recruteur->nomRecruteur = $request->nomRecruteur;
        $recruteur->prenomRecruteur = $request->prenomRecruteur;
        $recruteur->adresseRecruteur = $request->adresseRecruteur;
        $recruteur->mailRecruteur = $request->mailRecruteur;
        $recruteur->prestige = $request->prestige;
        $recruteur->estValide = $request->estValide;
        $recruteur->etat = $request->etat;
        $recruteur->structure = $request->structure;
        $recruteur->save();

        return redirect()->route('admin.recruteur.index')
            ->with('success', 'Recruteur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recruteur  $recruteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recruteur $recruteur)
    {
        $recruteur->delete();
        return redirect()->route('admin.recruteur.index')
            ->with('success', 'Recruteur supprimé avec succès.');
    }
}

