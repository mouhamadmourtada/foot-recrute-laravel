@extends('base.base')

@section('main')
    <div class="container mt-2">
            

        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('admin.centre.update',$centre->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom du Centre:</strong>
                        <input type="text" name="nomCentre" value="{{ $centre->nomCentre }}" class="form-control" placeholder="Nom du Centre">
                        @error('nomCentre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Adresse du Centre:</strong>
                        <input type="text" name="adresseCentre" value="{{ $centre->adresseCentre }}" class="form-control" placeholder="Adresse du Centre">
                        @error('adresseCentre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email du Centre:</strong>
                        <input type="email" name="mailCentre" value="{{ $centre->mailCentre }}" class="form-control" placeholder="Email du Centre">
                        @error('mailCentre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Téléphone du Centre:</strong>
                        <input type="text" name="telephoneCentre" value="{{ $centre->telephoneCentre }}" class="form-control" placeholder="Téléphone du Centre">
                        @error('telephoneCentre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Est International:</strong>
                        <select name="estInternation" class="form-control">
                            <option value="0" {{ $centre->estInternation == 0 ? 'selected' : '' }}>Non</option>
                            <option value="1" {{ $centre->estInternation == 1 ? 'selected' : '' }}>Oui</option>
                        </select>
                        @error('estInternation')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Date de Fondation:</strong>
                        <input type="date" name="dateFondation" value="{{ $centre->dateFondation }}" class="form-control" placeholder="Date de Fondation">
                        @error('dateFondation')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection

    
