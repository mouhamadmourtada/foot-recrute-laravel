
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
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom du Recruteur:</strong>
                        <input type="text" name="nomRecruteur" class="form-control" placeholder="Nom du Recruteur">
                        @error('nomRecruteur')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prénom du Recruteur:</strong>
                        <input type="text" name="prenomRecruteur" class="form-control" placeholder="Prénom du Recruteur">
                        @error('prenomRecruteur')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Adresse du Recruteur:</strong>
                        <input type="text" name="adresseRecruteur" class="form-control" placeholder="Adresse du Recruteur">
                        @error('adresseRecruteur')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email du Recruteur:</strong>
                        <input type="email" name="mailRecruteur" class="form-control" placeholder="Email du Recruteur">
                        @error('mailRecruteur')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prestige:</strong>
                        <input type="number" name="prestige" class="form-control" placeholder="Prestige" min="1" max="10">
                        @error('prestige')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Valide:</strong>
                        <select name="estValide" class="form-control">
                            <option value="0">Non</option>
                            <option value="1">Oui</option>
                        </select>
                        @error('estValide')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>État:</strong>
                        <select name="etat" class="form-control">
                            <option value="actif">Actif</option>
                            <option value="inactif">Inactif</option>
                        </select>
                        @error('etat')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Structure:</strong>
                        <input type="text" name="structure" class="form-control" placeholder="Structure">
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
