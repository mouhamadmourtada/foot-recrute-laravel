@extends('base.base')

@section('main')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Détails du Centre de Formation</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nom du Centre:</strong> {{ $centre->nomCentre }}</p>
                        <p><strong>Adresse du Centre:</strong> {{ $centre->adresseCentre }}</p>
                        <p><strong>Téléphone du Centre:</strong> {{ $centre->telephoneCentre }}</p>
                        <p><strong>Email du Centre:</strong> {{ $centre->mailCentre }}</p>
                        <p><strong>Est International:</strong> {{ $centre->estInternation ? 'Oui' : 'Non' }}</p>
                        <p><strong>Date de Fondation:</strong> {{ $centre->dateFondation }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Date de Création:</strong> {{ $centre->created_at }}</p>
                        <p><strong>Dernière mise à jour:</strong> {{ $centre->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title">Liste des Joueurs dans ce Centre de Formation</h5>
            </div>
            <div class="card-body">
                @if ($centre->joueurs->count() > 0)
                    <ul>
                        @foreach ($centre->joueurs as $joueur)
                            <li>{{ $joueur->nomJoueur }} {{ $joueur->prenomJoueur }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Aucun joueur n'est actuellement enregistré dans ce centre de formation.</p>
                @endif
            </div>
        </div>
    </div>


@endsection

{{-- 
<div class="container mt-2">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Détails du Centre de Formation</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nom du Centre:</strong> {{ $centre->nomCentre }}</p>
                    <p><strong>Adresse du Centre:</strong> {{ $centre->adresseCentre }}</p>
                    <p><strong>Téléphone du Centre:</strong> {{ $centre->telephoneCentre }}</p>
                    <p><strong>Email du Centre:</strong> {{ $centre->mailCentre }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Est International:</strong> {{ $centre->estInternation ? 'Oui' : 'Non' }}</p>
                    <p><strong>Date de Fondation:</strong> {{ $centre->dateFondation }}</p>
                    <p><strong>Date de Création:</strong> {{ $centre->created_at }}</p>
                    <p><strong>Dernière mise à jour:</strong> {{ $centre->updated_at }}</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}