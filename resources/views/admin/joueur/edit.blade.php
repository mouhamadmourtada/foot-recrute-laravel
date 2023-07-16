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

                <div class="card mt-2">
                    {{-- prenom et nom  --}}
                    <div class="row">
                        {{-- prneom joueur  --}}
                        <div class="col">
                            <div class="form-group">
                                <x-input-form-crud name="prenomJoueur" label="Prénom" type="text" placeholder="Saisir votre prénom" value="{{$joueur->prenomJoueur}}"/>
                            </div>
                          
                        </div>
                        {{-- nom joueur  --}}
                        <div class="col">
                            <div class="form-group">
                                <x-input-form-crud name="nomJoueur" label="Nom" type="text" placeholder="Saisir votre nom" value="{{$joueur->nomJoueur}}"/>
                            </div>
                        </div>
                    </div>
    
                    {{-- dateNaissance, lieu naiss, adressse  --}}
                    <div class="row">
                        <div class="col">
                            {{-- dateNaissance --}}
                            <div class="form-group">
                                <x-input-form-crud value="{{$joueur->dateNaissance}}" name="dateNaissance" label="Date de naissance" type="date" placeholder=""/>
                            </div>
                        
                        </div>
                        {{-- lieuNaissance --}}
                        <div class="col">
                            <div class="form-group">
                                <x-input-form-crud value="{{$joueur->lieuNaissance}}" name="lieuNaissance" label="Lieu de naissance" type="text" placeholder="Saisir votre lieu de naissance"/>
                            </div>
    
                        </div>
                        {{-- adresse  --}}
                        <div class="col">
                            <div class="form-group">                                
                                <x-input-form-crud value="{{$joueur->adresseJoueur}}" name="adresseJoueur" label="Adresse" type="text" placeholder="saisir l'adresse du joueur"/>
                            </div>
                        </div>
                        
                    </div>
    
                    {{-- mail, poste, est gardien --}}
                    <div class="row">
                        {{-- mail joueur --}}
                        <div class="col">
                            <div class="form-group">
                                <x-input-form-crud value="{{$joueur->mailJoueur}}" name="mailJoueur" label="Email" type="text" placeholder=""/>
                            </div>
                        </div>

                        {{-- poste et est validé  --}}
                        <div class="col">
                            <div class="row">
                                {{-- poste  --}}
                                <div class="col">
                                            
                                    <x-my-select value="{{$joueur->poste}}" :options="[
                                        ['value' => 'DC', 'label' => 'Défenseur Central'],
                                        ['value' => 'DLD', 'label' => 'Défenseur Latéral Droit'],
                                        ['value' => 'DLG', 'label' => 'Défenseur Latéral Gauche'],
                                        ['value' => 'MC', 'label' => 'Milieu Central'],
                                        ['value' => 'MD', 'label' => 'Milieu Droit'],
                                        ['value' => 'MG', 'label' => 'Milieu Gauche'],
                                        ['value' => 'MO', 'label' => 'Milieu Offensif'],
                                        ['value' => 'MOC', 'label' => 'Milieu Offensif Central'],
                                        ['value' => 'AG', 'label' => 'Attaquant Gauche'],
                                        ['value' => 'AD', 'label' => 'Attaquant Droit'],
                                        ['value' => 'AP', 'label' => 'Attaquant Pointe'],
                                        ['value' => 'G', 'label' => 'Gardien'],
                                    ]" 
                                    label="Poste" name="poste"></x-my-select>
                                    
                                </div>
    
                                {{-- est validé --}}
                                <div class="col">
                                    <x-my-select value="{{$joueur->estValide}}" :options="[
                                        ['value' => '0', 'label' => 'NON'],
                                        ['value' => '1', 'label' => 'OUI'],
                                        
                                    ]" 
                                    label="Est validé" name="estValide"></x-my-select>
                                    @error('estValide')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- centre et gariden? --}}
                <div class="card mt-3 py-1 text-center">
                    <div style="max-width: 400px;">
                        @php
                        $optionsCentres = [];

                        foreach ($centresFormation as $centre) {
                            $optionsCentres[] = [
                                'value' => $centre->id,
                                'label' => $centre->nomCentre,
                            ];
                        }
                        @endphp

                        <x-my-select value="{{$joueur->centre_formation_id}}" :options="$optionsCentres" label="Centre de formation" name="centre_formation_id">
                        </x-my-select>
                    </div>            
                </div>  

                

                <p>critere physique</p>
                
             
                <div class="card">

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
                            <div style="max-width: 250px;">
                                <div class="form-group">
                                    <x-input-form-crud value="{{ $criterePhysique->$nomAttribut ?? ''}}"  name="{{$nomAttribut}}" label="{{ $infosAttribut['label'] }}" type="number" placeholder=""/>
                                </div>
                            </div>
                        @endforeach
                        
                    @else
                        
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
                        <div style="display: flex; flex-direction : row; flex-wrap : wrap; justify-content : space-between;">
    
                            @foreach ($attributs as $nomAttribut => $infosAttribut)
                                <div style="max-width: 250px;">
                                    <div class="form-group">
                                        <x-input-form-crud value="{{ $criterePhysique->$nomAttribut ?? ''}}" name="{{$nomAttribut}}" label="{{ $infosAttribut['label'] }}" type="number" placeholder=""/>
                                    </div>
                                </div>
                            @endforeach
    
                        {{-- pied fort --}}
                        <div style="width : 100px" >
                                
                            <x-my-select value="{{$joueur->piedFort}}" :options="[
                                    ['value' => 'Droit', 'label' => 'Droite'],
                                    ['value' => 'Gauche', 'label' => 'Gauche'],
                                    
                                ]" 
                                label="Pied fort" name="piedFort"></x-my-select>
                                @error('estValide')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                        </div>
                    @endif
                </div>

                


                




            </div>
            <div style="text-align: right;">
                    
                <button type="submit" class="btn m-3" style="background-color: #124158; color : white;">
                    <i class="bi bi-check-all"></i>
                    Enregistrer</button>

            </div>
        </form>
    </div>

@endsection