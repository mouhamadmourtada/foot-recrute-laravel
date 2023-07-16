@extends('base.base')

@section('main')
    <div class="container mt-2">
        

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif


        <x-indique-add :sectionTitle="'Liste des centres'" :route="route('admin.centre.create')" :buttonText="'Nouveau'" :title="'ajouter un nouveau centre'"/>


        <div class="table-responsive mdtableListe">
            {{-- @php
                $tableau_headers = [
                ['text' => 'Nom', 'icon' => 'bi bi-person'],
                ['text' => 'Adresse', 'icon' => 'bi bi-geo-alt'],
                ['text' => 'Email', 'icon' => 'bi bi-envelope'],
                ['text' => 'Telephone', 'icon' => 'bi bi-telephone'],
                ['text' => 'Internation', 'icon'=> ''],
                ['text' => 'Action', 'icon'=> '']

                // ...
                ];
            @endphp --}}

            {{-- <x-tableau-list :tableau_headers="$tableau_headers"> 
                @foreach ($centres as $centre)
                    <tr class="ligneTableau">
                        <td>
                            <div class="d-flex align-items-center flex-wrap" style="flex-wrap: nowrap">
                                <img
                                    src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                    alt=""
                                    style="width: 45px; height: 45px"
                                    class="rounded-circle"
                                    />
                                <p style="margin : 0px 0px 0px 3px;">{{ $centre->nomCentre }}</p>
                            </div>
                            
                        </td>
                        <td>{{ $centre->adresseCentre }}</td>
                        <td>{{ $centre->mailCentre }}</td>
                        <td>{{ $centre->telephoneCentre }}</td>
                        <td>{{ $centre->estInternation ? 'Oui' : 'Non' }}</td>
                        <td style="text-align : center; width: 110px;">
                        <form class="text-center" action="{{ route('admin.centre.destroy', $centre->id) }}" method="POST">
                            <a title="modifier" class="btn p-1" href="{{ route('admin.centre.edit', $centre->id) }}"><i class="bi bi-pencil-square" style="font-size: 14px;"></i></a>
                            <a title="visualiser" class="btn p-1" href="{{ route('admin.centre.show', $centre->id) }}"><i class="bi bi-eye" style="font-size: 14px;"></i></a>
                            @csrf
                            @method('DELETE')
                            <button title="supprimer" type="submit" class="btn p-1"><i class="bi bi-trash3" style="font-size: 14px; color: red; border: none; outline: none;"></i></button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </x-tableau-list>
 --}}

            
            <table class="table-responsive mdtableListe align-middle mb-0">
              <tr class="mb-5">
                {{-- <th>S.No</th> --}}
                <th class="mdthListe text-center">Nom</th>
                <th class="mdthListe">
                    <i class="bi bi-geo-alt"></i>
                    Adresse</th>
                <th class="mdthListe">
                    <i class="bi bi-envelope"></i>Email
                </th>
                <th class="mdthListe">
                    <i class="bi bi-telephone"></i>Téléphone
                </th>
                <th class="mdthListe">International</th>
                {{-- <th>Date de Fondation</th> --}}
                <th class="text-center mdthListe" style="width: 110px; min-width : 110px">Action</th>
              </tr>
              @foreach ($centres as $centre)
                <tr class="ligneTableau">
                    {{-- <td>{{ $centre->id }}</td> --}}
                    <td>
                        <div class="d-flex align-items-center flex-wrap" style="flex-wrap: nowrap">
                            <img
                                src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle"
                                />
                            <p style="margin : 0px 0px 0px 3px;">{{ $centre->nomCentre }}</p>
                        </div>
                        
                    </td>
                    <td>{{ $centre->adresseCentre }}</td>
                    <td>{{ $centre->mailCentre }}</td>
                    <td>{{ $centre->telephoneCentre }}</td>
                    <td>{{ $centre->estInternation ? 'Oui' : 'Non' }}</td>
                    {{-- <td>{{ $centre->dateFondation }}</td> --}}
                    <td class="thAction">
                    <form class="text-center" action="{{ route('admin.centre.destroy', $centre->id) }}" method="POST">
                        <a title="modifier" class="btn p-1" href="{{ route('admin.centre.edit', $centre->id) }}"><i class="bi bi-pencil-square" style="font-size: 14px;"></i></a>
                        <a title="visualiser" class="btn p-1" href="{{ route('admin.centre.show', $centre->id) }}"><i class="bi bi-eye" style="font-size: 14px;"></i></a>
                        @csrf
                        @method('DELETE')
                        <button title="supprimer" type="submit" class="btn p-1"><i class="bi bi-trash3" style="font-size: 14px; color: red; border: none; outline: none;"></i></button>
                    </form>
                    </td>
                </tr>
              @endforeach
            </table>
        </div>
          

        {!! $centres->links() !!}
    </div>
@endsection

    

