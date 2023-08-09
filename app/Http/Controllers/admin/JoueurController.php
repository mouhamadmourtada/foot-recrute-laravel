<?php

namespace App\Http\Controllers\admin;

use App\Models\Joueur;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\JoueurRegisterRequest;
use App\Models\CentreFormation;
use App\Models\criterePhysiqueGardien;
use App\Models\criterePhysiqueJoueur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joueurs = Joueur::orderBy('id', 'desc')->paginate(5);
        return view('admin.joueur.index', compact('joueurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centresFormation = CentreFormation::all();
        $criterePhysiqueJoueur = new criterePhysiqueJoueur();
        $criterePhysiqueGardien = new criterePhysiqueGardien();

        return view('admin.joueur.create', compact('centresFormation', 'criterePhysiqueJoueur', 'criterePhysiqueGardien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JoueurRegisterRequest $request)
    {

        $data = $request->validated();

        $joueur = Joueur::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nomJoueur' => $data['nomJoueur'],
            'prenomJoueur' => $data['prenomJoueur'],
            'adresseJoueur' => $data['adresseJoueur'],
            'poste' => $data['poste'],
            'estGardien' => $data['estGardien'],
            'centre_formation_id' => $data['centre_formation_id'],
            'lieuNaissance' => $data['lieuNaissance'],
            'dateNaissance' => $data['dateNaissance'],
            'isValidated' => false,

        ]);


        if ($joueur->estGardien) {
            $critere = new CriterePhysiqueGardien;
            $critere->joueur_id = $joueur->id;
            $critere->saut = $request->saut;
            $critere->plongeon = $request->plongeon;
            $critere->arret = $request->arret;
            $critere->degageemnt = $request->degageemnt;
            $critere->placement = $request->placement;
            $critere->reflex = $request->reflex;
            $critere->save();
        } else {
            $critere = new CriterePhysiqueJoueur;
            $critere->joueur_id = $joueur->id;
            $critere->vitesse = $request->vitesse;
            $critere->puissance = $request->puissance;
            $critere->endurance = $request->endurance;
            $critere->taille = $request->taille;
            $critere->controle = $request->controle;
            $critere->passe = $request->passe;
            $critere->tir = $request->tir;
            $critere->dribble = $request->dribble;
            $critere->tete = $request->tete;
            $critere->piedFort = $request->piedFort;
            $critere->piedGauche = $request->piedGauche;
            $critere->piedDroit = $request->piedDroit;
            $critere->save();
        }

        return redirect()->route('admin.joueur.index')->with('success', 'Joueur créé avec succès.');
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function show(Joueur $joueur)
    {
        $criterePhysique = null;

        if ($joueur->estGardien) {
            // $criterePhysique = $joueur->criterePhysique();
            $criterePhysique = criterePhysiqueGardien::where('joueur_id', $joueur->id)->first();

        } else {

            $criterePhysique = criterePhysiqueJoueur::where('joueur_id', $joueur->id)->first();

        }
        return view('admin.joueur.show', compact('joueur', 'criterePhysique'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function edit(Joueur $joueur)
    {
        $criterePhysique = null;
        $centresFormation = CentreFormation::all();
        if ($joueur->estGardien) {
            $criterePhysique = criterePhysiqueGardien::where('joueur_id', $joueur->id)->first();

        } else {
            $criterePhysique = criterePhysiqueJoueur::where('joueur_id', $joueur->id)->first();
        }

        return view('admin.joueur.edit', compact('joueur', 'centresFormation', 'criterePhysique'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Joueur $joueur)
    {
        $request->validate([
            'email' => 'required|unique:joueurs,email,'.$joueur->id,
            'poste' => 'required',
            'nomJoueur' => 'required',
            'prenomJoueur' => 'required',
            'adresseJoueur' => 'required',
            'isValidated' => 'required',
            'lieuNaissance' => 'required',
            'dateNaissance' => 'required',
            'centre_formation_id' => 'required|exists:centre_formations,id',
        ]);

        $joueur->email = $request->email;
        $joueur->poste = $request->poste;
        $joueur->nomJoueur = $request->nomJoueur;
        $joueur->prenomJoueur = $request->prenomJoueur;
        $joueur->adresseJoueur = $request->adresseJoueur;
        $joueur->isValidated = $request->isValidated;
        $joueur->lieuNaissance = $request->lieuNaissance;
        $joueur->dateNaissance = $request->dateNaissance;
        // $joueur->estGardien = $request->estGardien;
        $joueur->centre_formation_id = $request->centre_formation_id;
        $joueur->save();

        if ($joueur->estGardien) {
            // Mise à jour des critères physiques du gardien
            $criterePhysiqueGardien = CriterePhysiqueGardien::where('joueur_id', $joueur->id)->firstOrFail();
            $criterePhysiqueGardien->saut = $request->saut;
            $criterePhysiqueGardien->plongeon = $request->plongeon;
            $criterePhysiqueGardien->arret = $request->arret;
            $criterePhysiqueGardien->degageemnt = $request->degageemnt;
            $criterePhysiqueGardien->placement = $request->placement;
            $criterePhysiqueGardien->reflex = $request->reflex;
            $criterePhysiqueGardien->save();
        } else {
            // Mise à jour des critères physiques du joueur
            $criterePhysiqueJoueur = CriterePhysiqueJoueur::where('joueur_id', $joueur->id)->firstOrFail();
            $criterePhysiqueJoueur->vitesse = $request->vitesse;
            $criterePhysiqueJoueur->puissance = $request->puissance;
            $criterePhysiqueJoueur->endurance = $request->endurance;
            $criterePhysiqueJoueur->taille = $request->taille;
            $criterePhysiqueJoueur->controle = $request->controle;
            $criterePhysiqueJoueur->passe = $request->passe;
            $criterePhysiqueJoueur->tir = $request->tir;
            $criterePhysiqueJoueur->dribble = $request->dribble;
            $criterePhysiqueJoueur->tete = $request->tete;
            $criterePhysiqueJoueur->piedFort = $request->piedFort;
            $criterePhysiqueJoueur->piedGauche = $request->piedGauche;
            $criterePhysiqueJoueur->piedDroit = $request->piedDroit;
            $criterePhysiqueJoueur->save();
        }

        return redirect()->route('admin.joueur.index')->with('success', 'Joueur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joueur $joueur)
    {
        $joueur->delete();
        return redirect()->route('admin.joueur.index')->with("success", 'joueur supprimé avec succès');
    }


}

