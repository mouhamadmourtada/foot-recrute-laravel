@extends('base.base')

@section('main')

    <div class="container mt-2">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        
        <x-indique-add :sectionTitle="'Liste des recruteurs'" :route="route('admin.recruteur.create')" :buttonText="'Nouveau'" :title="'ajouter un nouveau recruteur'"/>


       
        <div class="table-responsive">
            <table class="table-responsive align-middle mb-0 mdTableListe">
                <tr >
                    <th class="mdthListe">prenom & nom</th>
                    <th class="mdthListe">Adresse</th>
                    <th class="mdthListe">Email</th>
                    <th class="mdthListe">Prestige</th>
                    <th class="mdthListe">Valide</th>
                    <th class="mdthListe">État</th>
                    <th class="mdthListe">Structure</th>
                    <th class="text-center mdthListe thAction">Action</th>
                </tr>
                @foreach ($recruteurs as $recruteur)
                <tr class="ligneTableau">
                    <td>
                        <div class="d-flex align-items-center flex-wrap" style="flex-wrap: nowrap">
                            <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle">
                            <div>
                                <p class="m-0 ml-3">{{ $recruteur->prenomRecruteur }}</p>
                                <p class="m-0 ml-3">{{ $recruteur->nomRecruteur }}</p>

                            </div>
                        </div>
                    </td>
                    <td>{{ $recruteur->adresseRecruteur }}</td>
                    <td>{{ $recruteur->mailRecruteur }}</td>
                    <td>{{ $recruteur->prestige }}</td>
                    <td>{{ $recruteur->estValide ? 'Oui' : 'Non' }}</td>
                    <td>{{ $recruteur->etat }}</td>
                    <td>{{ $recruteur->structure }}</td>
                    <td class="thAction">
                        <form action="{{ route('admin.recruteur.destroy', $recruteur->id) }}" method="POST">
                            <a title="modifier" class="btn p-1" href="{{ route('admin.recruteur.edit', $recruteur->id) }}"><i
                                    class="bi bi-pencil-square" style="font-size: 14px;"></i></a>
                            <a title="visualiser" class="btn p-1" href="{{ route('admin.recruteur.show', $recruteur->id) }}"><i
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
        
        

        {!! $recruteurs->links() !!}
    </div>

@endsection