@extends('base.base')

@section('main')
    <div class="container mt-2">

        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('admin.joueur.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mail du Joueur:</strong>
                        <input type="text" name="mailJoueur" class="form-control" placeholder="Mail du Joueur">
                        @error('mailJoueur')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Poste:</strong>
                        <select name="poste" class="form-control">
                            <option value="DC">Défenseur Central</option>
                            <option value="DLD">Défenseur Latéral Droit</option>
                            <option value="DLG">Défenseur Latéral Gauche</option>
                            <option value="MC">Milieu Central</option>
                            <option value="MD">Milieu Droit</option>
                            <option value="MG">Milieu Gauche</option>
                            <option value="MO">Milieu Offensif</option>
                            <option value="MOC">Milieu Offensif Central</option>
                            <option value="AG">Attaquant Gauche</option>
                            <option value="AD">Attaquant Droit</option>
                            <option value="AP">Attaquant Pointe</option>
                            <option value="G">Gardien</option>
                        </select>
                        @error('poste')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom du Joueur:</strong>
                        <input type="text" name="nomJoueur" class="form-control" placeholder="Nom du Joueur">
                        @error('nomJoueur')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prénom du Joueur:</strong>
                        <input type="text" name="prenomJoueur" class="form-control" placeholder="Prénom du Joueur">
                        @error('prenomJoueur')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Adresse du Joueur:</strong>
                        <input type="text" name="adresseJoueur" class="form-control" placeholder="Adresse du Joueur">
                        @error('adresseJoueur')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Est Valide:</strong>
                        <select name="estValide" class="form-control">
                            <option value="0">Non</option>
                            <option value="1">Oui</option>
                        </select>
                        @error('estValide')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lieu de Naissance:</strong>
                        <input type="text" name="lieuNaissance" class="form-control" placeholder="Lieu de Naissance">
                        @error('lieuNaissance')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Date de Naissance:</strong>
                        <input type="date" name="dateNaissance" class="form-control" placeholder="Date de Naissance">
                        @error('dateNaissance')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Centre de Formation:</strong>
                        <select name="centre_formation_id" class="form-control">
                            <option value="">Sélectionner un centre de formation</option>
                            @foreach ($centresFormation as $centre)
                                <option value="{{ $centre->id }}">{{ $centre->nomCentre }}</option>
                            @endforeach
                        </select>
                        @error('centre_formation_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                

                <div class="form-group">
                    <label>Est Gardien</label>
                    <select name="estGardien" class="form-control" id="estGardienSelect">
                        <option value="0">Non</option>
                        <option value="1">Oui</option>
                    </select>
                </div>
                

                <div class="criterePhysiqueGardienFields" style="display: none;">
                    @php
                        $critere = $criterePhysiqueGardien;
                        $attributs = [
                            'saut' => ['label' => 'Saut', 'min' => 1, 'max' => 100],
                            'plongeon' => ['label' => 'Plongeon', 'min' => 1, 'max' => 100],
                            'arret' => ['label' => 'Arrêt', 'min' => 1, 'max' => 100],
                            'degageemnt' => ['label' => 'Dégageemnt', 'min' => 1, 'max' => 100],
                            'placement' => ['label' => 'Placement', 'min' => 1, 'max' => 100],
                            'reflex' => ['label' => 'Réflexe', 'min' => 1, 'max' => 100],
                        ];
                    @endphp
                    @foreach ($attributs as $nomAttribut => $infosAttribut)
                        <div class="form-group">
                            <label>{{ $infosAttribut['label'] }}</label>
                            <input type="number" name="{{ $nomAttribut }}" class="form-control" min="{{ $infosAttribut['min'] }}" max="{{ $infosAttribut['max'] }}" value="{{ old($nomAttribut, $critere->$nomAttribut ?? '') }}">
                        </div>
                    @endforeach
                </div>

                <div class="criterePhysiqueJoueurFields">
                    @php
                        $critere = $criterePhysiqueJoueur;
                        $attributs = [
                            'vitesse' => ['label' => 'Vitesse', 'min' => 1, 'max' => 100],
                            'puissance' => ['label' => 'Puissance', 'min' => 1, 'max' => 100],
                            'endurance' => ['label' => 'Endurance', 'min' => 1, 'max' => 100],
                            'taille' => ['label' => 'Taille', 'min' => 0, 'max' => 999],
                            'controle' => ['label' => 'Contrôle', 'min' => 1, 'max' => 100],
                            'passe' => ['label' => 'Passe', 'min' => 1, 'max' => 100],
                            'tir' => ['label' => 'Tir', 'min' => 1, 'max' => 100],
                            'dribble' => ['label' => 'Dribble', 'min' => 1, 'max' => 100],
                            'tete' => ['label' => 'Tête', 'min' => 1, 'max' => 100],
                            // 'piedFort' => ['label' => 'Pied Fort', 'min' => 1, 'max' => 100],
                            'piedGauche' => ['label' => 'Pied Gauche', 'min' => 1, 'max' => 100],
                            'piedDroit' => ['label' => 'Pied Droit', 'min' => 1, 'max' => 100],
                        ];
                    @endphp

                    @foreach ($attributs as $nomAttribut => $infosAttribut)
                    <div class="form-group">
                        <label>{{ $infosAttribut['label'] }}</label>
                        <input type="number" name="{{ $nomAttribut }}" class="form-control" min="{{ $infosAttribut['min'] }}" max="{{ $infosAttribut['max'] }}" value="{{ old($nomAttribut, $critere->$nomAttribut ?? '') }}">
                    </div>
                    @endforeach
                    <div class="form-group">
                        <label>Pied fort</label>
                        <select name="piedFort" class="form-control">
                            <option value="Droit">droite</option>
                            <option value="Gauche">gauche</option>
                        </select>
                    </div>

                </div>

             

                
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let estGardienSelect = document.getElementById('estGardienSelect');
            let criterePhysiqueGardienFields = document.querySelector('.criterePhysiqueGardienFields');
            let criterePhysiqueJoueurFields = document.querySelector('.criterePhysiqueJoueurFields');


            function toggleCriterePhysiqueFields() {
                console.log("detecter changement")
                if (estGardienSelect.value === '1') {
                    criterePhysiqueGardienFields.style.display = 'block';
                    criterePhysiqueJoueurFields.style.display = 'none';
                } else {
                    criterePhysiqueGardienFields.style.display = 'none';
                    criterePhysiqueJoueurFields.style.display = 'block';
                }
            }

            estGardienSelect.addEventListener('change', toggleCriterePhysiqueFields);

            // Appel initial pour afficher les champs appropriés en fonction de la valeur sélectionnée
            toggleCriterePhysiqueFields();
        });
    </script>

    @endsection

    {{-- @if ($joueur->estGardien)
        <!-- Champs du formulaire pour le critère physique du gardien -->
        <div class="form-group">
            <label>Saut</label>
            <input type="number" name="saut" class="form-control" min="1" max="100">
        </div>
        <div class="form-group">
            <label>Plongeon</label>
            <input type="number" name="plongeon" class="form-control" min="1" max="100">
        </div>
        <!-- ... Ajoutez les autres attributs du critère physique du gardien -->
    @else
        <!-- Champs du formulaire pour le critère physique du joueur -->
        <div class="form-group">
            <label>Vitesse</label>
            <input type="number" name="vitesse" class="form-control" min="1" max="100">
        </div>
        <div class="form-group">
            <label>Puissance</label>
            <input type="number" name="puissance" class="form-control" min="1" max="100">
        </div>
        <!-- ... Ajoutez les autres attributs du critère physique du joueur -->
    @endif --}}