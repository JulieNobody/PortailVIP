@extends('Templates\template')


@section('title')
Intervention n°{{$intervention->NumInt}}
@endsection



@section('contenu')

    <h1>Détail intervention {{$intervention->NumInt}}</h1>

    <div class="admin-crea-form">


        {!! Form::open(['url' => 'admin-modification','files' => 'true','enctype'=>'multipart/form-data']) !!}

        <fieldset>
            <legend>Coordonnées client</legend>
            <h2>Client Facturation</h2>
            <ul>
                <li>Nom client : {{$intervention->NomFactCli}}</li>
                <li>Adresse : {{$intervention->AdFactCli}}</li>
                <li>Code Postal : {{$intervention->CPFactCli}}</li>
                <li>Ville : {{$intervention->VilleFactCli}}</li>
                <li>Interlocuteur :{{$intervention->InterlocFactCli}}</li>
                <li>Tel: {{$intervention->TelFactCli}}</li>
                <li>Fax: {{$intervention->FaxFactCli}}</li>
            </ul>
            <h2>Client Livraison</h2>
            <ul>
                <li>Nom client : {{$intervention->NomLivCli}}</li>
                <li>Adresse : {{$intervention->AdLivCli}}</li>
                <li>Code Postal : {{$intervention->CPLivCli}}</li>
                <li>Ville : {{$intervention->VilleLivCli}}</li>
                <li>Interlocuteur :{{$intervention->InterlocLivCli}}</li>
                <li>Tel: {{$intervention->TelLivCli}}</li>
                <li>Fax: {{$intervention->FaxLivCli}}</li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>Détail demande client</legend>
            <ul>
                <li>Référence client : {{$intervention->RefDossierCli}}</li>
                <li>Marque : {{$intervention->Marque}}</li>
                <li>Type Appareil : {{$intervention->TypeApp}}</li>
                <li>Numéro de série : {{$intervention->NumSerie}}</li>
                <li>Date début garantie : </li>
                <li>Date fin garantie : {{$intervention->DateFinSG}}</li>
                <li>Date enregistrement : {{$intervention->DateEnr->format('d-m-Y')}}</li>
                <li>Problème rencontré : {{$intervention->ligneDetail->DesignArt}}</li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>Détail visites</legend>
            <ul>
                <li>Date début intervention : {{$intervention->DateDebInterv}}</li>
                <li>Date fin intervention : {{$intervention->DateFinInterv}}</li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>Documents associés</legend>
            <div class="wrapper">
                <div class="table">
                    <div class="row header">
                        <div class="cell" data-title="NomDocument">
                            Nom document
                        </div>
                        <div class="cell" data-title="Date">
                            Date
                        </div>
                        <div class="cell" data-title="Heure">
                            Heure
                        </div>
                    </div>

                    {{-- @if(count($documents) == 0)
                        </div>
                            <p class="aucunResultat" >
                                Aucun document
                            </p>
                    @else --}}

                    {{-- @foreach ($docuements as $d) --}}

                    <div class="row">
                        <div class="cell" data-title="NomDocument">
                            <a href="">nom du doc</a>
                        </div>
                        <div class="cell" data-title="Date">
                            date du doc
                        </div>
                        <div class="cell" data-title="Heure">
                            heure du doc
                        </div>
                    </div>
                    {{-- @endforeach

                    @endif --}}
                </div>
            </div>

        </fieldset>

    </div>

@endsection
