@extends('Templates\template')


@section('title')
Admin - Liste des utilisateurs
@endsection



@section('contenu')

    <h1>Liste des utilisateurs</h1>

    <div class="admin-crea-form">

        <div class="wrapper">

            <div class="table">

              <div class="row header">

                <div class="cell" data-title="CodeUtil">
                    CodeUtil
                </div>
                <div class="cell" data-title="NomUtil">
                    NomUtil
                </div>
                <div class="cell" data-title="Admin">
                    Admin
                </div>
                <div class="cell" data-title="Détail Utilisateur">
                    Détail Utilisateur
                </div>
                <div class="cell" data-title="Modifier Utilisateur">
                    Modifier Utilisateur
                </div>

              </div>

                {{-- @foreach ($listeInterventions as $interventions) --}}

                @if(empty($utilisateurs))

                <div class="row">
                    <div class="cell">
                        Aucun utilisateur dans la base
                    </div>
                </div>

                @else

                @foreach ($utilisateurs as $u)

                <div class="row">
                    <div class="cell" data-title="CodeUtil">
                        {{$u->CodeUtil}}
                    </div>
                    <div class="cell" data-title="NomUtil">
                        {{$u->NomUtil}}
                    </div>
                    <div class="cell" data-title="Admin">
                        {{$u->Admin}}
                    </div>
                    <div class="cell" data-title="Détail Utilisateur">
                        <a href="">X</a>
                    </div>
                    <div class="cell" data-title="Modifier Utilisateur">
                        <a href="{{route('admin-modification-get', [$u->id])}}">X</a>
                    </div>
                </div>

                @endforeach

                @endif
            </div>

            @if($utilisateurs)
                {{ $utilisateurs->links("pagination::default") }}
            @endif
          </div>
    </div>

    <div class="boutonOrange">
        <a href="{{route('admin-creation-get')}}">Ajouter un utilisateur</a>
    </div>

@endsection
