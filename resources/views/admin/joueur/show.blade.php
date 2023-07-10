
@extends('base.base')

@section('main')


    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Détails du Joueur</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Mail du Joueur:</strong> {{ $joueur->mailJoueur }}</p>
                        <p><strong>Poste:</strong> {{ $joueur->poste }}</p>
                        <p><strong>Nom du Joueur:</strong> {{ $joueur->nomJoueur }}</p>
                        <p><strong>Prénom du Joueur:</strong> {{ $joueur->prenomJoueur }}</p>
                        <p><strong>Adresse du Joueur:</strong> {{ $joueur->adresseJoueur }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Est Valide:</strong> {{ $joueur->estValide ? 'Oui' : 'Non' }}</p>
                        <p><strong>Lieu de Naissance:</strong> {{ $joueur->lieuNaissance }}</p>
                        <p><strong>Date de Naissance:</strong> {{ $joueur->dateNaissance }}</p>
                        <p><strong>Est Gardien:</strong> {{ $joueur->estGardien ? 'Oui' : 'Non' }}</p>
                        <p><strong>Date de Création:</strong> {{ $joueur->created_at }}</p>
                        <p><strong>Dernière mise à jour:</strong> {{ $joueur->updated_at }}</p>
                        <p><strong>Centre de Formation:</strong> <a href="{{ route('admin.centre.show', $joueur->centreFormation->id) }}">{{ $joueur->centreFormation->nomCentre }}</a></p>
                    </div>
                </div>
                <div class="row">
                    <p>Les criteres physiques du joueur</p>

                    @if ($joueur->estGardien)
                        @if ($criterePhysique)
                            <p><strong>Saut:</strong> {{ $criterePhysique->saut }}</p>
                            <p><strong>Plongeon:</strong> {{ $criterePhysique->plongeon }}</p>
                            <p><strong>Arrêt:</strong> {{ $criterePhysique->arret }}</p>
                            <p><strong>Dégagement:</strong> {{ $criterePhysique->degageemnt }}</p>
                            <p><strong>Placement:</strong> {{ $criterePhysique->placement }}</p>
                            <p><strong>Réflexe:</strong> {{ $criterePhysique->reflex }}</p>
                        @else
                            <p>Aucun critère physique de gardien disponible.</p>
                        @endif
                    @else
                        @if ($criterePhysique)
                            <p><strong>Vitesse:</strong> {{ $criterePhysique->vitesse }}</p>
                            <p><strong>Puissance:</strong> {{ $criterePhysique->puissance }}</p>
                            <p><strong>Endurance:</strong> {{ $criterePhysique->endurance }}</p>
                            <p><strong>Taille:</strong> {{ $criterePhysique->taille }}</p>
                            <p><strong>Contrôle:</strong> {{ $criterePhysique->controle }}</p>
                            <p><strong>Passe:</strong> {{ $criterePhysique->passe }}</p>
                            <p><strong>Tir:</strong> {{ $criterePhysique->tir }}</p>
                            <p><strong>Dribble:</strong> {{ $criterePhysique->dribble }}</p>
                            <p><strong>Tête:</strong> {{ $criterePhysique->tete }}</p>
                            <p><strong>Pied Gauche:</strong> {{ $criterePhysique->piedGauche }}</p>
                            <p><strong>Pied Droit:</strong> {{ $criterePhysique->piedDroit }}</p>
                        @else
                            <p>Aucun critère physique de joueur disponible.</p>
                        @endif
                    @endif
                       
                </div>
            </div>
        </div>
    </div>


@endsection


{{-- <div class="container mt-2">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Détails du Joueur</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Mail du Joueur:</strong> {{ $joueur->mailJoueur }}</p>
                    <p><strong>Poste:</strong> {{ $joueur->poste }}</p>
                    <p><strong>Nom du Joueur:</strong> {{ $joueur->nomJoueur }}</p>
                    <p><strong>Prénom du Joueur:</strong> {{ $joueur->prenomJoueur }}</p>
                    <p><strong>Adresse du Joueur:</strong> {{ $joueur->adresseJoueur }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Est Valide:</strong> {{ $joueur->estValide ? 'Oui' : 'Non' }}</p>
                    <p><strong>Lieu de Naissance:</strong> {{ $joueur->lieuNaissance }}</p>
                    <p><strong>Date de Naissance:</strong> {{ $joueur->dateNaissance }}</p>
                    <p><strong>Est Gardien:</strong> {{ $joueur->estGardien ? 'Oui' : 'Non' }}</p>
                    <p><strong>Date de Création:</strong> {{ $joueur->created_at }}</p>
                    <p><strong>Dernière mise à jour:</strong> {{ $joueur->updated_at }}</p>
                    <p><strong>Centre de Formation:</strong> {{ $joueur->centreFormation->nomCentre }}</p>
                    <p><strong>Adresse du Centre:</strong> {{ $joueur->centreFormation->adresseCentre }}</p>
                    <p><strong>Téléphone du Centre:</strong> {{ $joueur->centreFormation->telephoneCentre }}</p>
                    <p><strong>Email du Centre:</strong> {{ $joueur->centreFormation->mailCentre }}</p>
                    <p><strong>Est International:</strong> {{ $joueur->centreFormation->estInternation ? 'Oui' : 'Non' }}</p>
                    <p><strong>Date de Fondation:</strong> {{ $joueur->centreFormation->dateFondation }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
 --}}
