@extends('base.base')

@section('main')
    <div class="container mt-2">

        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif

        <form class="mdForm" action="{{ route('admin.joueur.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            
            {{-- row principal --}}
            <div class="row">
                <div class="card mt-2">
                    {{-- prenom et nom  --}}
                    <div class="row">
                        {{-- prneom joueur  --}}
                        <div class="col">
                            <div class="form-group">
                                <x-input-form-crud name="prenomJoueur" label="Prénom" type="text" placeholder="Saisir votre prénom" />
                            </div>
                          
                        </div>
                        {{-- nom joueur  --}}
                        <div class="col">
                            <div class="form-group">
                                <x-input-form-crud name="nomJoueur" label="Nom" type="text" placeholder="Saisir votre nom"/>
                            </div>
                        </div>
                    </div>
    
                    {{-- dateNaissance, lieu naiss, adressse  --}}
                    <div class="row">
                        <div class="col">
                            {{-- dateNaissance --}}
                            <div class="form-group">
                                <x-input-form-crud name="dateNaissance" label="Date de naissance" type="date" placeholder=""/>
                            </div>
                        
                        </div>
                        {{-- lieuNaissance --}}
                        <div class="col">
                            <div class="form-group">
                                <x-input-form-crud name="lieuNaissance" label="Lieu de naissance" type="text" placeholder="Saisir votre lieu de naissance"/>
                            </div>
    
                        </div>
                        {{-- adresse  --}}
                        <div class="col">
                            <div class="form-group">                                
                                <x-input-form-crud name="adresseJoueur" label="Adresse" type="text" placeholder="saisir l'adresse du joueur"/>
                            </div>
                        </div>
                        
                    </div>
    
                    {{-- mail, poste, est gardien --}}
                    <div class="row">
                        {{-- mail joueur --}}
                        <div class="col">
                            <div class="form-group">
                                <x-input-form-crud name="mailJoueur" label="Email" type="text" placeholder=""/>
                            </div>
                        </div>

                        {{-- poste et est validé  --}}
                        <div class="col">
                            <div class="row">
                                {{-- poste  --}}
                                <div class="col">
                                            
                                    <x-my-select value="" :options="[
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
                                        ['value' => 'G', 'label' => 'Gardien']
                                    ]" 
                                    label="Poste" name="poste"></x-my-select>
                                    @error('poste')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                {{-- est validé --}}
                                <div class="col">
                                    <x-my-select value="" :options="[
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
                <div class="card mt-3 py-1">
                    <div class="row">
                        {{-- centre formation --}}
                        <div class="col">
                            @php
                            $optionsCentres = [];
    
                            foreach ($centresFormation as $centre) {
                                $optionsCentres[] = [
                                    'value' => $centre->id,
                                    'label' => $centre->nomCentre,
                                ];
                            }
                            @endphp
    
                            <x-my-select value="" :options="$optionsCentres" label="Centre de formation" name="centre_formation_id">
                            </x-my-select>
                        </div>
    
                        {{-- est gardien --}}
                        <div class="col">
                            <div class="form-group">
                                <label>Est Gardien</label>
                                <select name="estGardien" class="form-control" id="estGardienSelect">
                                    <option value="0">Non</option>
                                    <option value="1">Oui</option>
                                </select>
                            </div>
                        </div>
    
                    </div>                
                    
                </div>                

                <hr>
                <h4>Critere Physique </h4>
                <div class="card">

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
                            <div style="max-width: 250px;">
                                <div class="form-group">
                                    <x-input-form-crud name="{{$nomAttribut}}" label="{{ $infosAttribut['label'] }}" type="number" placeholder=""/>
                                </div>
                            </div>
                        @endforeach
                    </div>
    
                    <div class="criterePhysiqueJoueurFields">
                       
                        <div style="display: flex; flex-direction : row; flex-wrap : wrap; justify-content : space-between;">
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
                                    'piedGauche' => ['label' => 'Pied Gauche', 'min' => 1, 'max' => 100],
                                    'piedDroit' => ['label' => 'Pied Droit', 'min' => 1, 'max' => 100],
                                ];
                            @endphp
                        
                            @foreach ($attributs as $nomAttribut => $infosAttribut)
                                <div style="max-width: 250px;">
                                    <div class="form-group">
                                        <x-input-form-crud name="{{$nomAttribut}}" label="{{ $infosAttribut['label'] }}" type="number" placeholder=""/>
                                    </div>
                                </div>
                            @endforeach
                        
                            {{-- pied fort --}}
                            <div style="width : 100px" >
                                
                                <x-my-select value="" :options="[
                                        ['value' => 'Droit', 'label' => 'Droite'],
                                        ['value' => 'Gauche', 'label' => 'Gauche'],
                                        
                                    ]" 
                                    label="Pied fort" name="piedFort"></x-my-select>
                                    @error('estValide')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                            </div>
                            
                            </div>
                            
                           
                        </div>
                        
    
                    </div>

                </div>


             
                
                <div style="text-align: right;">
                    
                    <button type="submit" class="btn m-3" style="background-color: #124158; color : white;">
                        <i class="bi bi-check-all"></i>
                        Enregistrer</button>

                </div>
                
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