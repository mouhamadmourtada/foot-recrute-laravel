@extends('base.base')

@section('main')
    <div class="container mt-2">

        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('admin.recruteur.update',$recruteur->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom du Recruteur:</strong>
                        <input type="text" name="nomRecruteur" value="{{ $recruteur->nomRecruteur }}" class="form-control" placeholder="Nom du Recruteur" readonly>
                        @error('nomRecruteur')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prénom du Recruteur:</strong>
                        <input type="text" name="prenomRecruteur" value="{{ $recruteur->prenomRecruteur }}" class="form-control" placeholder="Prénom du Recruteur" readonly>
                        @error('prenomRecruteur')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Adresse du Recruteur:</strong>
                        <input type="text" name="adresseRecruteur" value="{{ $recruteur->adresseRecruteur }}" class="form-control" placeholder="Adresse du Recruteur">
                        @error('adresseRecruteur')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email du Recruteur:</strong>
                        <input type="email" name="mailRecruteur" value="{{ $recruteur->mailRecruteur }}" class="form-control" placeholder="Email du Recruteur">
                        @error('mailRecruteur')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prestige:</strong>
                        <input type="number" name="prestige" value="{{ $recruteur->prestige }}" class="form-control" placeholder="Prestige" min="1" max="10">
                        @error('prestige')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Valide:</strong>
                        <input type="checkbox" name="estValide" value="1" {{ $recruteur->estValide ? 'checked' : '' }}>
                        @error('estValide')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>État:</strong>
                        <select name="etat" class="form-control">
                            <option value="actif" {{ $recruteur->etat == 'actif' ? 'selected' : '' }}>Actif</option>
                            <option value="inactif" {{ $recruteur->etat == 'inactif' ? 'selected' : '' }}>Inactif</option>
                        </select>
                        @error('etat')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Structure:</strong>
                        <input type="text" name="structure" value="{{ $recruteur->structure }}" class="form-control" placeholder="Structure">
                        @error('structure')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>

@endsection