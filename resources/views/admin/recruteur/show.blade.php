@extends('base.base')

@section('main')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Détails du Recruteur</h5>
            </div>
            <div class="card-body infoCentre">
                <style>
                    .infoCentre strong{
                        color : #947653;
                    }
                    .infoCentre i{
                        margin-right: 10px;
                    }
                </style>
                <div class="row"style="font-size: 13px">
                    <div class="col-md-6">
                        <p><strong>Nom du Recruteur:</strong> {{ $recruteur->nomRecruteur }}</p>
                        <p><strong>Prénom du Recruteur:</strong> {{ $recruteur->prenomRecruteur }}</p>
                        <p><strong><i class="bi bi-geo-alt"></i>Adresse du Recruteur:</strong> {{ $recruteur->adresseRecruteur }}</p>
                        <p><strong><i class="bi bi-envelope-check"></i>Email du Recruteur:</strong> {{ $recruteur->email }}</p>
                        <p><strong>Prestige:</strong> {{ $recruteur->prestige }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Valide:</strong> {{ $recruteur->isValidated ? 'Oui' : 'Non' }}</p>
                        <p><strong>État:</strong> {{ $recruteur->etat }}</p>
                        <p><strong>Structure:</strong> {{ $recruteur->structure }}</p>
                        <p><strong><i class="bi bi-calendar"></i>Date de Création:</strong> {{ $recruteur->created_at }}</p>
                        <p><strong><i class="bi bi-calendar"></i>Dernière mise à jour:</strong> {{ $recruteur->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title">Liste des Joueurs suivis par ce Recruteur</h5>
            </div>
            <div class="card-body">
                @if ($recruteur->joueurs->count() > 0)
                    <ul>
                        @foreach ($recruteur->joueurs as $joueur)
                            <li>{{ $joueur->nomJoueur }} {{ $joueur->prenomJoueur }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Aucun joueur n'est actuellement suivi par ce recruteur.</p>
                @endif
            </div>
        </div>
    </div>

@endsection
