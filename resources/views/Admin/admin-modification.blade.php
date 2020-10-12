@extends('Templates\template')


@section('title')
Admin - Modification utilisateur
@endsection



@section('contenu')

    <h1>Modification utilisateur</h1>

    <div class="admin-crea-form">


        {!! Form::open(['url' => 'admin-modification','files' => 'true','enctype'=>'multipart/form-data']) !!}

        <fieldset>
            <legend>Général</legend>
            <div>
                {!! Form::label('id', 'ID : ', ['class' => '#']) !!}
                {!! Form::text('id', $userId, ['class' => '#','readonly']) !!}
                {!! $errors->first('id', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('SocSiteVIP', 'Société : ', ['class' => '#']) !!}
                {!! Form::text('SocSiteVIP', $defautSocSiteVIP, ['class' => '#']) !!}
                {!! $errors->first('SocSiteVIP', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('CodeUtil', 'Code client : ', ['class' => '#']) !!}
                {!! Form::text('CodeUtil', $defautCodeUtil, ['class' => '#']) !!}
                {!! $errors->first('CodeUtil', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('NomUtil', 'Nom client : ', ['class' => '#']) !!}
                {!! Form::text('NomUtil', $defautNomUtil, ['class' => '#']) !!}
                {!! $errors->first('NomUtil', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('PassUtil', 'Nouveau mot de passe (en clair) : ', ['class' => '#']) !!}
                {!! Form::text('PassUtil', $defautPassUtil, ['class' => '#']) !!}
                {!! $errors->first('PassUtil', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('Admin', 'Admin (1 pour oui, 0 pour non) : ', ['class' => '#']) !!}
                {!! Form::text('Admin', $defautAdmin, ['class' => '#']) !!}
                {!! $errors->first('Admin', '<small >:message</small>') !!}
            </div>
        </fieldset>

        <fieldset>
            <legend>Contrat</legend>
            <div>
                {!! Form::label('AgContrat', 'Ag Contrat (non null) : ', ['class' => '#']) !!}
                {!! Form::text('AgContrat', $defautAgContrat, ['class' => '#']) !!}
                {!! $errors->first('AgContrat', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('automenu1', 'Auto menu 1 : ', ['class' => '#']) !!}
                {!! Form::text('automenu1', $defautautomenu1, ['class' => '#']) !!}
                {!! $errors->first('automenu1', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('fonction', 'Fonction : ', ['class' => '#']) !!}
                {!! Form::text('fonction', $defautfonction, ['class' => '#']) !!}
                {!! $errors->first('fonction', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('DateModifPass', 'DateModifPass : ', ['class' => '#']) !!}
                {!! Form::text('DateModifPass', $defautDateModifPass, ['class' => '#']) !!}
                {!! $errors->first('DateModifPass', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('LogoClient', 'Nouveau LogoClient : ', ['class' => '#']) !!}
                {!! Form::file('LogoClient', null, ['class' => '#']) !!}
                {!! $errors->first('LogoClient', '<small >:message</small>') !!}
            </div>
        </fieldset>

        <fieldset>
            <legend>E-mails</legend>
            <div>
                {!! Form::label('AdMailContact', 'AdMailContact (non null) : ', ['class' => '#']) !!}
                {!! Form::text('AdMailContact', $defautAdMailContact, ['class' => '#']) !!}
                {!! $errors->first('AdMailContact', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AdMailExped', 'AdMailExped (non null) : ', ['class' => '#']) !!}
                {!! Form::text('AdMailExped', $defautAdMailExped, ['class' => '#']) !!}
                {!! $errors->first('AdMailExped', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AdMailCopie', 'AdMailCopie (non null) : ', ['class' => '#']) !!}
                {!! Form::text('AdMailCopie', $defautAdMailCopie, ['class' => '#']) !!}
                {!! $errors->first('AdMailCopie', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('EnvMailCloture', 'EnvMailCloture (non null) : ', ['class' => '#']) !!}
                {!! Form::text('EnvMailCloture', $defautEnvMailCloture, ['class' => '#']) !!}
                {!! $errors->first('EnvMailCloture', '<small >:message</small>') !!}
            </div>
        </fieldset>

        <fieldset>
            <legend>Détails</legend>
            <div>
                {!! Form::label('DateDebEnvMail', 'DateDebEnvMail (non null) : ', ['class' => '#']) !!}
                {!! Form::text('DateDebEnvMail', $defautDateDebEnvMail, ['class' => '#']) !!}
                {!! $errors->first('DateDebEnvMail', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AuthDemInterv', 'AuthDemInterv : ', ['class' => '#']) !!}
                {!! Form::text('AuthDemInterv', $defautAuthDemInterv, ['class' => '#']) !!}
                {!! $errors->first('AuthDemInterv', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('CodeCliFact', 'CodeCliFact (non null) : ', ['class' => '#']) !!}
                {!! Form::text('CodeCliFact', $defautCodeCliFact, ['class' => '#']) !!}
                {!! $errors->first('CodeCliFact', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AffListeProjet', 'AffListeProjet (non null) : ', ['class' => '#']) !!}
                {!! Form::text('AffListeProjet', $defautAffListeProjet, ['class' => '#']) !!}
                {!! $errors->first('AffListeProjet', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('DemIntervAffProjet', 'DemIntervAffProjet (non null) : ', ['class' => '#']) !!}
                {!! Form::text('DemIntervAffProjet', $defautDemIntervAffProjet, ['class' => '#']) !!}
                {!! $errors->first('DemIntervAffProjet', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('DemIntervAgMain', 'DemIntervAgMain (non null) : ', ['class' => '#']) !!}
                {!! Form::text('DemIntervAgMain', $defautDemIntervAgMain, ['class' => '#']) !!}
                {!! $errors->first('DemIntervAgMain', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('DemIntervAgTrf', 'DemIntervAgTrf (non null) : ', ['class' => '#']) !!}
                {!! Form::text('DemIntervAgTrf', $defautDemIntervAgTrf, ['class' => '#']) !!}
                {!! $errors->first('DemIntervAgTrf', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('ActivChargeSiteCli', 'ActivChargeSiteCli : ', ['class' => '#']) !!}
                {!! Form::text('ActivChargeSiteCli', $defautActivChargeSiteCli, ['class' => '#']) !!}
                {!! $errors->first('ActivChargeSiteCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('DateDebChargeSite', 'DateDebChargeSite (non null) : ', ['class' => '#']) !!}
                {!! Form::text('DateDebChargeSite', $defautDateDebChargeSite, ['class' => '#']) !!}
                {!! $errors->first('DateDebChargeSite', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AuthPlanningAssist', 'AuthPlanningAssist : ', ['class' => '#']) !!}
                {!! Form::text('AuthPlanningAssist', $defautAuthPlanningAssist, ['class' => '#']) !!}
                {!! $errors->first('AuthPlanningAssist', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AccesDirectPlanningAssist', 'AccesDirectPlanningAssist : ', ['class' => '#']) !!}
                {!! Form::text('AccesDirectPlanningAssist', $defautAccesDirectPlanningAssist, ['class' => '#']) !!}
                {!! $errors->first('AccesDirectPlanningAssist', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('VuePortailGlobal', 'VuePortailGlobal : ', ['class' => '#']) !!}
                {!! Form::text('VuePortailGlobal', $defautVuePortailGlobal, ['class' => '#']) !!}
                {!! $errors->first('VuePortailGlobal', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('ExpressCenter', 'ExpressCenter : ', ['class' => '#']) !!}
                {!! Form::text('ExpressCenter', $defautExpressCenter, ['class' => '#']) !!}
                {!! $errors->first('ExpressCenter', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('CliDemSGEpson', 'CliDemSGEpson : ', ['class' => '#']) !!}
                {!! Form::text('CliDemSGEpson', $defautCliDemSGEpson, ['class' => '#']) !!}
                {!! $errors->first('CliDemSGEpson', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AffLstClassification', 'AffLstClassification : ', ['class' => '#']) !!}
                {!! Form::text('AffLstClassification', $defautAffLstClassification, ['class' => '#']) !!}
                {!! $errors->first('AffLstClassification', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AffDelais', 'AffDelais : ', ['class' => '#']) !!}
                {!! Form::text('AffDelais', $defautAffDelais, ['class' => '#']) !!}
                {!! $errors->first('AffDelais', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AuthCloture', 'AuthCloture : ', ['class' => '#']) !!}
                {!! Form::text('AuthCloture', $defautAuthCloture, ['class' => '#']) !!}
                {!! $errors->first('AuthCloture', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AuthDepotDocs', 'AuthDepotDocs : ', ['class' => '#']) !!}
                {!! Form::text('AuthDepotDocs', $defautAuthDepotDocs, ['class' => '#']) !!}
                {!! $errors->first('AuthDepotDocs', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AuthVisuAttCmd', 'AuthVisuAttCmd : ', ['class' => '#']) !!}
                {!! Form::text('AuthVisuAttCmd', $defautAuthVisuAttCmd, ['class' => '#']) !!}
                {!! $errors->first('AuthVisuAttCmd', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AuthSwapNonEligible', 'AuthSwapNonEligible : ', ['class' => '#']) !!}
                {!! Form::text('AuthSwapNonEligible', $defautAuthSwapNonEligible, ['class' => '#']) !!}
                {!! $errors->first('AuthSwapNonEligible', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AuthTransporteur', 'AuthTransporteur : ', ['class' => '#']) !!}
                {!! Form::text('AuthTransporteur', $defautAuthTransporteur, ['class' => '#']) !!}
                {!! $errors->first('AuthTransporteur', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AuthAffSousStatut', 'AuthAffSousStatut : ', ['class' => '#']) !!}
                {!! Form::text('AuthAffSousStatut', $defautAuthAffSousStatut, ['class' => '#']) !!}
                {!! $errors->first('AuthAffSousStatut', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AgPourEnvoiPieces', 'AgPourEnvoiPieces (non null) : ', ['class' => '#']) !!}
                {!! Form::text('AgPourEnvoiPieces', $defautAgPourEnvoiPieces, ['class' => '#']) !!}
                {!! $errors->first('AgPourEnvoiPieces', '<small >:message</small>') !!}
            </div>
        </fieldset>

            {!! Form::submit('Valider') !!}

        {!! Form::close() !!}


    </div>

@endsection
