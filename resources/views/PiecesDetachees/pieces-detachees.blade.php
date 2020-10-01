@extends('Templates\template')

@section('contenu')
    <h1>Pièces Detachées</h1>

    <h3>Client : {{$client->NomUtil}}</h3>
    <h3>Nom client : {!! $nomClient !!}</h3>

    <h4>test : </h3>
        <ul>
            @foreach ($test as $i)
                <li>
                    id : {{$i->id}}
                    <ul>
                        <li>mot cle : {{$i->mot_cle}}</li>
                    </ul>
                </li>
             @endforeach
        </ul>


    <h4>interventions : </h3>
    <ul>
        @foreach ($interventions as $i)
            <li>
                Numéro inter : {{$i->NumInt}}
                <ul>
                    <li>Ref Client : {{$i->RefDossierCli}}</li>
                    <li>Statut : {{$i->StatutInterv}}</li>
                    <li>Ville : {{$i->VilleLivCli}}</li>
                </ul>
            </li>
         @endforeach
    </ul>

    <h4>toutes les interventions : </h3>
    <ul>
        @foreach ($toutesInterventions as $i)
            <li>
                Numéro ID : {{$i->id}}
                <ul>
                    <li>Numéro inter : {{$i->NumInt}}</li>
                    <li>Ref Client : {{$i->RefDossierCli}}</li>
                    <li>Statut : {{$i->StatutInterv}}</li>
                    <li>Ville : {{$i->VilleLivCli}}</li>
                </ul>
            </li>
         @endforeach
    </ul>





    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
         ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
         laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
         voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
         non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


@endsection
