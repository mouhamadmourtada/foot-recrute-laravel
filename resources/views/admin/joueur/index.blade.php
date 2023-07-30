@extends('base.base')

@section('main')
    <div class="container mt-2">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

       
        <x-indique-add :sectionTitle="'Liste des joueurs'" :route="route('admin.joueur.create')" :buttonText="'Nouveau'" :title="'ajouter un nouveau joueur'"/>

          

        {{-- <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Nom du Joueur</th>
                <th>Mail du Joueur</th>
                <th>Poste</th>
                <th>Est Valide</th>
                <th>Lieu de Naissance</th>
                <th>Date de Naissance</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($joueurs as $joueur)
            <tr>
                <td>{{ $joueur->id }}</td>
                <td>{{ $joueur->nomJoueur }}</td>
                <td>{{ $joueur->mailJoueur }}</td>
                <td>{{ $joueur->poste }}</td>
                <td>{{ $joueur->estValide ? 'Oui' : 'Non' }}</td>
                <td>{{ $joueur->lieuNaissance }}</td>
                <td>{{ $joueur->dateNaissance }}</td>
                <td>
                    <form action="{{ route('admin.joueur.destroy', $joueur->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('admin.joueur.edit', $joueur->id) }}">Edit</a>
                        <a class="btn btn-primary" href="{{ route('admin.joueur.show', $joueur->id) }}">view</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table> --}}

        <div class="table-responsive ">
            <table class="table-responsive align-middle mb-0 mdTableListe">
                <tr>
                    <th class="mdthListe">prenom & nom</th>
                    <th class="mdthListe">
                        <i class="bi bi-envelope"></i>Email
                    </th>
                    <th class="mdthListe">Poste</th>
                    <th class="mdthListe">Est Valide</th>
                    <th class="mdthListe">
                        <i class="bi bi-geo-alt-fill"></i>Lieu de Naissance
                    </th>
                    <th class="mdthListe">
                        <i class="bi bi-calendar"></i>Date de Naissance
                    </th>
                    <th class="text-center mdthListe thAction" >Action</th>
                </tr>
                @foreach ($joueurs as $joueur)
                    <tr class="ligneTableau">
                        <td>
                            <div class="d-flex align-items-center flex-wrap" style="flex-wrap: nowrap">
                                <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                    style="width: 45px; height: 45px" class="rounded-circle" />
                                    <div>
                                        <p >{{ $joueur->prenomJoueur }}</p>
                                        <p >{{ $joueur->nomJoueur }}</p>

                                    </div>
                            </div>
                        </td>
                        <td>{{ $joueur->mailJoueur }}</td>
                        <td>{{ $joueur->poste }}</td>
                        <td>{{ $joueur->estValide ? 'Oui' : 'Non' }}</td>
                        <td>{{ $joueur->lieuNaissance }}</td>
                        <td>{{ $joueur->dateNaissance }}</td>
                        <td class="thAction">
                            <form action="{{ route('admin.joueur.destroy', $joueur->id) }}" method="POST">
                                <a title="modifier" class="btn p-1" href="{{ route('admin.joueur.edit', $joueur->id) }}"><i
                                        class="bi bi-pencil-square" style="font-size: 14px;"></i></a>
                                <a title="visualiser" class="btn p-1" href="{{ route('admin.joueur.show', $joueur->id) }}"><i
                                        class="bi bi-eye" style="font-size: 14px;"></i></a>
                                @csrf
                                @method('DELETE')
                                <button title="supprimer" type="submit" class="btn p-1"><i
                                        class="bi bi-trash3" style="font-size: 14px; color: red; border: none; outline: none;"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        

        {!! $joueurs->links() !!}
    </div>

@endsection