@extends('Templates\template')


@section('title')
Admin - Détail utilisateur
@endsection



@section('contenu')

    <h1>Détail utilisateur</h1>

    <div class="admin-crea-form">


        {!! Form::open(['url' => 'admin-modification','files' => 'true','enctype'=>'multipart/form-data']) !!}

        <fieldset>
            <legend>Général</legend>
            <ul>
                <li>ID : {{$userId}}</li>
                <li>Société : {{$socSiteVIP}}</li>
                <li>Code client : {{$codeUtil}}</li>
                <li>Nom client : {{$nomUtil}}</li>
                <li>mot de passe (en clair) :{{$passUtil}}</li>
                <li>Admin (1 pour oui, 0 pour non) : {{$admin}}</li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>Contrat</legend>
            <ul>
                <li>Ag Contrat (non null) : {{$agContrat}}</li>
                <li>Auto menu 1 : {{$automenu1}}</li>
                <li>Fonction : {{$fonction}}</li>
                <li>DateModifPass : {{$dateModifPass}}</li>
                <li>Nouveau LogoClient : </li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>E-mails</legend>
            <ul>
                <li>AdMailContact (non null) : {{$adMailContact}}</li>
                <li>AdMailExped (non null) : {{$adMailExped}}</li>
                <li>AdMailCopie (non null) : {{$adMailCopie}}</li>
                <li>EnvMailCloture (non null) : {{$envMailCloture}}</li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>Détails</legend>

            <ul>
                <li>DateDebEnvMail (non null) : {{$dateDebEnvMail}}</li>
                <li>AuthDemInterv : {{$authDemInterv}}</li>
                <li>CodeCliFact (non null) : {{$codeCliFact}}</li>
                <li>AffListeProjet (non null) : {{$affListeProjet}}</li>
                <li>DemIntervAffProjet (non null) : {{$demIntervAffProjet}}</li>
                <li>DemIntervAgMain (non null) : {{$demIntervAgMain}}</li>
                <li>DemIntervAgTrf (non null) : {{$demIntervAgTrf}}</li>
                <li>ActivChargeSiteCli : {{$activChargeSiteCli}}</li>
                <li>DateDebChargeSite (non null) : {{$dateDebChargeSite}}</li>
                <li>AuthPlanningAssist : {{$authPlanningAssist}}</li>
                <li>AccesDirectPlanningAssist : {{$accesDirectPlanningAssist}}</li>
                <li>VuePortailGlobal : {{$vuePortailGlobal}}</li>
                <li>ExpressCenter : {{$expressCenter}}</li>
                <li>CliDemSGEpson : {{$cliDemSGEpson}}</li>
                <li>AffLstClassification : {{$affLstClassification}}</li>
                <li>AffDelais : {{$affDelais}}</li>
                <li>AuthCloture : {{$authCloture}}</li>
                <li>AuthDepotDocs : {{$authDepotDocs}}</li>
                <li>AuthVisuAttCmd : {{$authVisuAttCmd}}</li>
                <li>AuthSwapNonEligible : {{$authSwapNonEligible}}</li>
                <li>AuthTransporteur : {{$authTransporteur}}</li>
                <li>AuthAffSousStatut : {{$authAffSousStatut}}</li>
                <li>AgPourEnvoiPieces (non null) : {{$agPourEnvoiPieces}}</li>
            </ul>

        </fieldset>

        <div class="boutonOrange">
            <a href="{{route('admin-modification-get', [$userId])}}">Modifier l'utilisateur</a>
        </div>


    </div>

@endsection
