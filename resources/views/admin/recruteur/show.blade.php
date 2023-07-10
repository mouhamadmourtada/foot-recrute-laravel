@extends('base.base')

@section('main')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Détails du Recruteur</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nom du Recruteur:</strong> {{ $recruteur->nomRecruteur }}</p>
                        <p><strong>Prénom du Recruteur:</strong> {{ $recruteur->prenomRecruteur }}</p>
                        <p><strong>Adresse du Recruteur:</strong> {{ $recruteur->adresseRecruteur }}</p>
                        <p><strong>Email du Recruteur:</strong> {{ $recruteur->mailRecruteur }}</p>
                        <p><strong>Prestige:</strong> {{ $recruteur->prestige }}</p>
                        <p><strong>Valide:</strong> {{ $recruteur->estValide ? 'Oui' : 'Non' }}</p>
                        <p><strong>État:</strong> {{ $recruteur->etat }}</p>
                        <p><strong>Structure:</strong> {{ $recruteur->structure }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Date de Création:</strong> {{ $recruteur->created_at }}</p>
                        <p><strong>Dernière mise à jour:</strong> {{ $recruteur->updated_at }}</p>
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