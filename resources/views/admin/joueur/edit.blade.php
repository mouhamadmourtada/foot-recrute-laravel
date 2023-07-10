@extends('base.base')

@section('main')
    <div class="container mt-2">

        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('admin.joueur.update',$joueur->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mail du Joueur:</strong>
                        <input type="text" name="mailJoueur" value="{{ $joueur->mailJoueur }}" class="form-control" placeholder="Mail du Joueur">
                        @error('mailJoueur')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Poste:</strong>
                        <select name="poste" class="form-control">
                            <option value="DC" {{ $joueur->poste == 'DC' ? 'selected' : '' }}>Défenseur Central</option>
                            <option value="DLD" {{ $joueur->poste == 'DLD' ? 'selected' : '' }}>Défenseur Latéral Droit</option>
                            <option value="DLG" {{ $joueur->poste == 'DLG' ? 'selected' : '' }}>Défenseur Latéral Gauche</option>
                            <option value="MC" {{ $joueur->poste == 'MC' ? 'selected' : '' }}>Milieu Central</option>
                            <option value="MD" {{ $joueur->poste == 'MD' ? 'selected' : '' }}>Milieu Droit</option>
                            <option value="MG" {{ $joueur->poste == 'MG' ? 'selected' : '' }}>Milieu Gauche</option>
                            <option value="MO" {{ $joueur->poste == 'MO' ? 'selected' : '' }}>Milieu Offensif</option>
                            <option value="MOC" {{ $joueur->poste == 'MOC' ? 'selected' : '' }}>Milieu Offensif Central</option>
                            <option value="AG" {{ $joueur->poste == 'AG' ? 'selected' : '' }}>Attaquant Gauche</option>
                            <option value="AD" {{ $joueur->poste == 'AD' ? 'selected' : '' }}>Attaquant Droit</option>
                            <option value="AP" {{ $joueur->poste == 'AP' ? 'selected' : '' }}>Attaquant Pointe</option>
                            <option value="G" {{ $joueur->poste == 'G' ? 'selected' : '' }}>Gardien</option>
                        </select>
                        @error('poste')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom du Joueur:</strong>
                        <input type="text" name="nomJoueur" value="{{ $joueur->nomJoueur }}" class="form-control" placeholder="Nom du Joueur">
                        @error('nomJoueur')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prénom du Joueur:</strong>
                        <input type="text" name="prenomJoueur" value="{{ $joueur->prenomJoueur }}" class="form-control" placeholder="Prénom du Joueur">
                        @error('prenomJoueur')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Adresse du Joueur:</strong>
                        <input type="text" name="adresseJoueur" value="{{ $joueur->adresseJoueur }}" class="form-control" placeholder="Adresse du Joueur">
                        @error('adresseJoueur')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Est Valide:</strong>
                        <select name="estValide" class="form-control">
                            <option value="0" {{ $joueur->estValide == 0 ? 'selected' : '' }}>Non</option>
                            <option value="1" {{ $joueur->estValide == 1 ? 'selected' : '' }}>Oui</option>
                        </select>
                        @error('estValide')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lieu de Naissance:</strong>
                        <input type="text" name="lieuNaissance" value="{{ $joueur->lieuNaissance }}" class="form-control" placeholder="Lieu de Naissance">
                        @error('lieuNaissance')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Date de Naissance:</strong>
                        <input type="date" name="dateNaissance" value="{{ $joueur->dateNaissance }}" class="form-control" placeholder="Date de Naissance">
                        @error('dateNaissance')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Est Gardien:</strong>
                        <select name="estGardien" class="form-control" disabled>
                            <option value="0" {{ $joueur->estGardien == 0 ? 'selected' : '' }}>Non</option>
                            <option value="1" {{ $joueur->estGardien == 1 ? 'selected' : '' }}>Oui</option>
                        </select>
                        @error('estGardien')
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
                                <option value="{{ $centre->id }}" {{ $joueur->centreFormation->id == $centre->id ? 'selected' : '' }}>{{ $centre->nomCentre }}</option>
                            @endforeach
                        </select>
                        @error('centre_formation_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <p>critere physique</p>
                
             

                @if($joueur->estGardien)
                    <!-- Champs pour les critères physiques du gardien -->
                    @php
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
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>{{ $infosAttribut['label'] }}</label>
                                <input type="number" name="{{ $nomAttribut }}" class="form-control" min="{{ $infosAttribut['min'] }}" max="{{ $infosAttribut['max'] }}" value="{{ $criterePhysique->saut ?? '' }}">
                                @error($nomAttribut)
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                    
                @else
                    <!-- Champs pour les critères physiques du joueur -->
                    @php
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
                            'piedGauche' => ['label' => 'Pied Gauche', 'min' => 1, 'max' => 100],
                            'piedDroit' => ['label' => 'Pied Droit', 'min' => 1, 'max' => 100],
                        ];
                    @endphp

                    @foreach ($attributs as $nomAttribut => $infosAttribut)
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>{{ $infosAttribut['label'] }}</label>
                                <input type="number" name="{{ $nomAttribut }}" class="form-control" min="{{ $infosAttribut['min'] }}" max="{{ $infosAttribut['max'] }}" value="{{ $criterePhysique->$nomAttribut ?? '' }}">
                                @error($nomAttribut)
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label>Pied fort</label>
                        <select name="piedFort" class="form-control">
                            <option value="Droit" {{ $joueur->piedFort == 'Droit' ? 'selected' : '' }}>Droite</option>
                            <option value="Gauche" {{ $joueur->piedFort == 'Gauche' ? 'selected' : '' }}>Gauche</option>
                        </select>
                    </div>
                @endif


                




            </div>
            <button type="submit" class="btn btn-primary ml-3">Modifier</button>
        </form>
    </div>

@endsection