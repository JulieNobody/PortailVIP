@extends('Templates\template')


@section('title')
Admin - Liste des utilisateurs
@endsection



@section('contenu')

    <h1>Liste des utilisateurs</h1>

    <div class="admin-liste">


        <fieldset class="fieldset-liste-inter">
            <div class="filtresContainer">
                <form action="{{route('admin-liste')}}" method="get" class="form-example">
                    @csrf
                <!-- ------------ MOT CLE ------------  -->
                <div class="block-filtre">
                    <input type="text" placeholder="Nom utilisateur" name="valeurMotCle" value="{{$motcle}}">
                </div>

                <!-- ------------ BOUTON ------------  -->
                <div >
                    <button class="boutonFiltre" type="submit">Rechercher</button>
                </div>

            </form>

            </div>
        </fieldset>



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

                @if(count($utilisateurs) == 0)
                </div>
                    <p class="aucunResultat" >
                        Aucun utilisateur ne correspond à vôtre recherche
                    </p>
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
                        @if($u->Acces[8] == '1')
                            oui
                        @endif

                    </div>
                    <div class="cell" data-title="Détail Utilisateur">
                        <a href="{{route('admin-detail', [$u->id])}}"><img class="icon_tab" src="{{ asset('images/loupe_icon.png') }}"></a>
                    </div>
                    <div class="cell" data-title="Modifier Utilisateur">
                        <a href="{{route('admin-modification-get', [$u->id])}}"><img class="icon_tab" src="{{ asset('images/crayon_icon.png') }}"></a>
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
