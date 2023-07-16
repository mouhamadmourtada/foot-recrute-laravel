@extends('base.base')

@section('main')
    <div class="container mt-2">

        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif

        {{-- <form action="{{ route('admin.centre.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom du Centre:</strong>
                        <input type="text" name="nomCentre" class="form-control" placeholder="Nom du Centre">
                        @error('nomCentre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Adresse du Centre:</strong>
                        <input type="text" name="adresseCentre" class="form-control" placeholder="Adresse du Centre">
                        @error('adresseCentre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email du Centre:</strong>
                        <input type="email" name="mailCentre" class="form-control" placeholder="Email du Centre">
                        @error('mailCentre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Téléphone du Centre:</strong>
                        <input type="text" name="telephoneCentre" class="form-control" placeholder="Téléphone du Centre">
                        @error('telephoneCentre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Est International:</strong>
                        <select name="estInternation" class="form-control">
                            <option value="0">Non</option>
                            <option value="1">Oui</option>
                        </select>
                        @error('estInternation')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Date de Fondation:</strong>
                        <input type="date" name="dateFondation" class="form-control" placeholder="Date de Fondation">
                        @error('dateFondation')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form> --}}
        <form action="{{ route('admin.centre.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="row mt-4">
                <div class="col">
                    <div class="card px-1">
                        <div class="form-group">
                            <x-input-form-crud name="nomCentre" label="Nom du Centre" type="text" placeholder="Nom du Centre" />
                        </div>
                        <div class="form-group">
                            <x-input-form-crud name="adresseCentre" label="Adresse" type="text" placeholder="Adresse du Centre" />
                        </div>
                        <div class="form-group">
                            <x-input-form-crud name="mailCentre" label="Email" type="email" placeholder="Email du Centre" />
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card px-1">
                        <div class="form-group">
                            <x-input-form-crud name="telephoneCentre" label="Téléphone" type="text" placeholder="Téléphone du Centre" />
                        </div>
                        <x-my-select value="" :options="[
                            ['value' => '0', 'label' => 'NON'],
                            ['value' => '1', 'label' => 'OUI'],
                            
                        ]" 
                        label="Est International" name="estInternation"></x-my-select>
                     
                        <div class="form-group">
                            <x-input-form-crud name="dateFondation" label="Date de fondation" type="date" placeholder=""/>
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


    





    

