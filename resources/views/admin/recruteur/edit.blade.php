@extends('base.base')

@section('main')
    <div class="container mt-2">

        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif



        <form action="{{ route('admin.recruteur.update', $recruteur->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="row mx-1">
                    <div class="col">
                        <div class="form-group">
                            <x-input-form-crud name="nomRecruteur" label="Nom" type="text" placeholder="Saisir le nom du recruteur" :value="$recruteur->nomRecruteur" readonly />
                        </div>
                        <div class="form-group">
                            <x-input-form-crud name="prenomRecruteur" label="Prénom" type="text" placeholder="Saisir le prénom du recruteur" :value="$recruteur->prenomRecruteur" readonly />
                        </div>
                        <div class="form-group">
                            <x-input-form-crud name="email" label="Email" type="text" placeholder="Mail du recruteur" :value="$recruteur->email" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <x-input-form-crud name="adresseRecruteur" label="Adresse" type="text" placeholder="Adresse du recruteur" :value="$recruteur->adresseRecruteur" />
                        </div>
                        <div class="form-group">
                            <x-input-form-crud name="prestige" label="Prestige" type="text" placeholder="Prestige du recruteur" :value="$recruteur->prestige" />
                        </div>
                        <div class="row">
                            <div class="col">
                                <x-my-select :value="$recruteur->isValidated ? '1' : '0'" :options="[
                                    ['value' => '0', 'label' => 'NON'],
                                    ['value' => '1', 'label' => 'OUI'],
                                ]" label="Est validé" name="isValidated"></x-my-select>
                            </div>
                            <div class="col">
                                <x-my-select :value="$recruteur->etat" :options="[
                                    ['value' => 'actif', 'label' => 'Actif'],
                                    ['value' => 'inactif', 'label' => 'Inactif'],
                                ]" label="État" name="etat"></x-my-select>
                            </div>
                        </div>
                        <div class="form-group">
                            <x-input-form-crud name="structure" label="Structure" type="text" placeholder="La structure du recruteur" :value="$recruteur->structure" />
                        </div>
                    </div>
                </div>
            </div>

            <div style="text-align: right;">
                <button type="submit" class="btn m-3" style="background-color: #124158; color : white;">
                    <i class="bi bi-check-all"></i>
                    Enregistrer
                </button>
            </div>
        </form>

    </div>

@endsection
