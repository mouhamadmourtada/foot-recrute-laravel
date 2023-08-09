
@extends('base.base')

@section('main')

    <div class="container mt-2">

        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('admin.recruteur.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="row mx-1">
                    <div class="col">
                        <div class="form-group">
                            <x-input-form-crud name="password" label="Mot de passe" type="password" placeholder="" />
                        </div>

                    </div>
                    <div class="col">
                        <div class="form-group">
                            <x-input-form-crud name="email" label="Email" type="text" placeholder="Mail du recruteur" />
                        </div>
                    </div>

                </div>
                <div class="row mx-1">
                    <div class="col">
                        <div class="form-group">
                            <x-input-form-crud name="nomRecruteur" label="Nom" type="text" placeholder="Saisir le nom du recruteur" />
                        </div>
                        <div class="form-group">
                            <x-input-form-crud name="prenomRecruteur" label="Prénom" type="text" placeholder="Saisir le prenom du recruteur" />
                        </div>

                        <div class="form-group">
                            <x-input-form-crud name="adresseRecruteur" label="Adresse" type="text" placeholder="Adresse du recruteur" />
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-group">
                            <x-input-form-crud name="prestige" label="Prestige" type="number" placeholder="Prestige du recruteur" />
                        </div>
                        <div class="row">
                            <div class="col">
                                <x-my-select value="" :options="[
                                        ['value' => '0', 'label' => 'NON'],
                                        ['value' => '1', 'label' => 'OUI'],

                                    ]" label="Est validé" name="isValidated">
                                </x-my-select>
                            </div>
                            <div class="col">
                                <x-my-select value="" :options="[
                                        ['value' => 'actif', 'label' => 'Actif'],
                                        ['value' => 'inactif', 'label' => 'Inactif'],

                                    ]" label="Etat" name="etat">
                                </x-my-select>
                            </div>
                        </div>

                        <div class="form-group">
                            <x-input-form-crud name="structure" label="Structure" type="text" placeholder="La structure du recruteur" />
                        </div>
                    </div>

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
