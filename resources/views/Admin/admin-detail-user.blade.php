@extends('Templates\template')


@section('title')
Admin - Détail utilisateur
@endsection



@section('contenu')

    <h1>Détail utilisateur</h1>

    <div class="admin-crea-form">

        <fieldset>
            <legend>Général</legend>
            <ul>
                <li>ID : {{$user->id}}</li>
                <li>Société : {{$user->SocSiteVIP}}</li>
                <li>Code client : {{$user->CodeUtil}}</li>
                <li>Nom client : {{$user->NomUtil}}</li>
                <li>mot de passe (en crypté) :{{$user->PassUtil}}</li>
                <li>Admin (1 pour oui, 0 pour non) : {{$user->Admin}}</li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>Contrat</legend>
            <ul>
                <li>Ag Contrat (non null) : {{$user->AgContrat}}</li>
                <li>Auto menu 1 : {{$user->automenu1}}</li>
                <li>Fonction : {{$user->fonction}}</li>
                <li>DateModifPass : {{$user->DateModifPass}}</li>
                <li>Nouveau LogoClient : </li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>E-mails</legend>
            <ul>
                <li>AdMailContact (non null) : {{$user->AdMailContact}}</li>
                <li>AdMailExped (non null) : {{$user->AdMailExped}}</li>
                <li>AdMailCopie (non null) : {{$user->AdMailCopie}}</li>
                <li>EnvMailCloture (non null) : {{$user->EnvMailCloture}}</li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>Détails</legend>

            <ul>
                <li>DateDebEnvMail (non null) : {{$user->DateDebEnvMail}}</li>
                <li>AuthDemInterv : {{$user->AuthDemInterv}}</li>
                <li>CodeCliFact (non null) : {{$user->CodeCliFact}}</li>
                <li>AffListeProjet (non null) : {{$user->AffListeProjet}}</li>
                <li>DemIntervAffProjet (non null) : {{$user->DemIntervAffProjet}}</li>
                <li>DemIntervAgMain (non null) : {{$user->DemIntervAgMain}}</li>
                <li>DemIntervAgTrf (non null) : {{$user->DemIntervAgTrf}}</li>
                <li>ActivChargeSiteCli : {{$user->ActivChargeSiteCli}}</li>
                <li>DateDebChargeSite (non null) : {{$user->DateDebChargeSite}}</li>
                <li>AuthPlanningAssist : {{$user->AuthPlanningAssist}}</li>
                <li>AccesDirectPlanningAssist : {{$user->AccesDirectPlanningAssist}}</li>
                <li>VuePortailGlobal : {{$user->VuePortailGlobal}}</li>
                <li>ExpressCenter : {{$user->ExpressCenter}}</li>
                <li>CliDemSGEpson : {{$user->CliDemSGEpson}}</li>
                <li>AffLstClassification : {{$user->AffLstClassification}}</li>
                <li>AffDelais : {{$user->AffDelais}}</li>
                <li>AuthCloture : {{$user->AuthCloture}}</li>
                <li>AuthDepotDocs : {{$user->AuthDepotDocs}}</li>
                <li>AuthVisuAttCmd : {{$user->AuthVisuAttCmd}}</li>
                <li>AuthSwapNonEligible : {{$user->AuthSwapNonEligible}}</li>
                <li>AuthTransporteur : {{$user->AuthTransporteur}}</li>
                <li>AuthAffSousStatut : {{$user->AuthAffSousStatut}}</li>
                <li>AgPourEnvoiPieces (non null) : {{$user->AgPourEnvoiPieces}}</li>
            </ul>

        </fieldset>

        <div class="boutonOrange">
            <a href="{{route('admin-modification-get', [$userId])}}">Modifier l'utilisateur</a>
        </div>


    </div>

@endsection
