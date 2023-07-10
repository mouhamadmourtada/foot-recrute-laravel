@extends('base.base')

@section('main')
    <div>
        <div>création d'un joueur</div>
        <form action="{{route('admin.joueur.store', [
            'joueur' =>$joueur
        ])}}" method="post">
            @csrf
            @method("post")
            <div class="row">
                <div class="col-6">
                    @include('shared.input', ['type'=> "text", "name"=>"mailJoueur", "label"=>"email", "class"=>"col", "value" =>$joueur->emailJoueur])

                </div>
                <div class="col-6">

                    @include('shared.input', ['type'=> "text", "name"=>"poste", "label"=>"poste", "class"=>"col", "value" =>$joueur->poste])
                </div>
            </div>



            <button class="btn btn-primary">créer un joueur</button>
        </form>
       
    </div>
@endsection