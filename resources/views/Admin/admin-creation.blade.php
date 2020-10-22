@extends('Templates\template')


@section('title')
Admin - Création utilisateur
@endsection



@section('contenu')

    <h1>Création utilisateur</h1>

    <div class="admin-crea-form">


    {!! Form::open(['url' => 'admin-creation','files' => 'true','enctype'=>'multipart/form-data']) !!}

    <fieldset>
        <legend>Général</legend>
        <div>
            {!! Form::label('SocSiteVIP', 'Société : ') !!}
            {!! Form::text('SocSiteVIP', $defautSocSiteVIP) !!}
            {!! $errors->first('SocSiteVIP', '<small >:message</small>') !!}
        </div>
        <div>
            {!! Form::label('CodeUtil', 'Code client : ') !!}
            {!! Form::text('CodeUtil', $defautCodeUtil) !!}
            {!! $errors->first('CodeUtil', '<small >:message</small>') !!}
        </div>
        <div>
            {!! Form::label('NomUtil', 'Nom client : ') !!}
            {!! Form::text('NomUtil', $defautNomUtil) !!}
            {!! $errors->first('NomUtil', '<small >:message</small>') !!}
        </div>
        <div>
            {!! Form::label('PassUtil', 'Mot de passe (en clair) : ') !!}
            {!! Form::text('PassUtil', $defautPassUtil) !!}
            {!! $errors->first('PassUtil', '<small >:message</small>') !!}
        </div>

        <div class="tableau-auth">
            <div class="wrapper ">
                <div class="table">
                    <div class="row header">
                        <div class="cell" data-title="Acces">Accès</div>
                        <div class="cell" data-title="oui">OUI</div>
                        <div class="cell" data-title="non">NON</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('voirInter', 'Voir les interventions : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('voirInter', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('voirInter', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('demandeInter', 'Demander une intervention : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('demandeInter', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('demandeInter', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('piecesDetachees', 'Pièces détachées : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('piecesDetachees', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('piecesDetachees', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('demandeSupport', 'Faire une demande au support : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('demandeSupport', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('demandeSupport', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('creationActu', 'Créer une actualité : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('creationActu', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('creationActu', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('monCompte', 'Voir "Mon Compte" : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('monCompte', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('monCompte', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('voirFactures', 'Voir les factures : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('voirFactures', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('voirFactures', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('voirParc', 'Voir le parc : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('voirParc', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('voirParc', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('AdminMaintronic', 'Admin Maintronic : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('AdminMaintronic', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('AdminMaintronic', 'non', true) }}</div>
                    </div>
                </div>
            </div>
        </div>

    </fieldset>

    <fieldset>
        <legend>Contrat</legend>
        <div>
            {!! Form::label('AgContrat', 'Ag Contrat* (4 caractère) : ') !!}
            {!! Form::text('AgContrat', $defautAgContrat, ['required' => 'required']) !!}
            {!! $errors->first('AgContrat', '<small >:message</small>') !!}
        </div>
        <div>
            {!! Form::label('automenu1', 'Auto menu 1* : ') !!}
            {!! Form::text('automenu1', $defautautomenu1, ['required' => 'required']) !!}
            {!! $errors->first('automenu1', '<small >:message</small>') !!}
        </div>
        <div>
            {!! Form::label('fonction', 'Fonction : ') !!}
            {!! Form::text('fonction', $defautfonction) !!}
            {!! $errors->first('fonction', '<small >:message</small>') !!}
        </div>
        <div>
            {!! Form::label('LogoClient', 'LogoClient : ') !!}
            {!! Form::file('LogoClient', null) !!}
            {!! $errors->first('LogoClient', '<small >:message</small>') !!}
        </div>
    </fieldset>

    <fieldset>
        <legend>E-mails</legend>
        <div>
            {!! Form::label('AdMailContact', 'AdMailContact* : ') !!}
            {!! Form::email('AdMailContact', $defautAdMailContact, ['required' => 'required']) !!}
            {!! $errors->first('AdMailContact', '<small >:message</small>') !!}
        </div>
        <div>
            {!! Form::label('AdMailExped', 'AdMailExped* : ') !!}
            {!! Form::email('AdMailExped', $defautAdMailExped, ['required' => 'required']) !!}
            {!! $errors->first('AdMailExped', '<small >:message</small>') !!}
        </div>
        <div>
            {!! Form::label('AdMailCopie', 'AdMailCopie* : ') !!}
            {!! Form::email('AdMailCopie', $defautAdMailCopie, ['required' => 'required']) !!}
            {!! $errors->first('AdMailCopie', '<small >:message</small>') !!}
        </div>
        <div>
            {!! Form::label('EnvMailCloture', 'EnvMailCloture* : ') !!}
            {!! Form::email('EnvMailCloture', $defautEnvMailCloture, ['required' => 'required']) !!}
            {!! $errors->first('EnvMailCloture', '<small >:message</small>') !!}
        </div>
    </fieldset>

    <fieldset>
        <legend>Détails</legend>
        <div>
            {!! Form::label('DateDebEnvMail', 'DateDebEnvMail* : ') !!}
            {!! Form::date('DateDebEnvMail', $defautDateDebEnvMail, ['required' => 'required']) !!}
            {!! $errors->first('DateDebEnvMail', '<small >:message</small>') !!}
        </div>

        <div>
            {!! Form::label('CodeCliFact', 'CodeCliFact* : ') !!}
            {!! Form::text('CodeCliFact', $defautCodeCliFact, ['required' => 'required']) !!}
            {!! $errors->first('CodeCliFact', '<small >:message</small>') !!}
        </div>

        <div>
            {!! Form::label('DemIntervAffProjet', 'DemIntervAffProjet* : ') !!}
            {!! Form::text('DemIntervAffProjet', $defautDemIntervAffProjet, ['required' => 'required']) !!}
            {!! $errors->first('DemIntervAffProjet', '<small >:message</small>') !!}
        </div>
        <div>
            {!! Form::label('DemIntervAgMain', 'DemIntervAgMain* (4 caractère) : ') !!}
            {!! Form::text('DemIntervAgMain', $defautDemIntervAgMain, ['required' => 'required']) !!}
            {!! $errors->first('DemIntervAgMain', '<small >:message</small>') !!}
        </div>
        <div>
            {!! Form::label('DemIntervAgTrf', 'DemIntervAgTrf* (4 caractère) : ') !!}
            {!! Form::text('DemIntervAgTrf', $defautDemIntervAgTrf, ['required' => 'required']) !!}
            {!! $errors->first('DemIntervAgTrf', '<small >:message</small>') !!}
        </div>

        <div>
            {!! Form::label('DateDebChargeSite', 'DateDebChargeSite* : ') !!}
            {!! Form::date('DateDebChargeSite', $defautDateDebChargeSite, ['required' => 'required']) !!}
            {!! $errors->first('DateDebChargeSite', '<small >:message</small>') !!}
        </div>

        <div>
            {!! Form::label('AgPourEnvoiPieces', 'AgPourEnvoiPieces* (4 caractère) : ') !!}
            {!! Form::text('AgPourEnvoiPieces', $defautAgPourEnvoiPieces, ['required' => 'required']) !!}
            {!! $errors->first('AgPourEnvoiPieces', '<small >:message</small>') !!}
        </div>

        <div class="tableau-auth">
            <div class="wrapper ">
                <div class="table">
                    <div class="row header">
                        <div class="cell" data-title="authorisation">Authorisations</div>
                        <div class="cell" data-title="oui">OUI</div>
                        <div class="cell" data-title="non">NON</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('AuthDemInterv', 'AuthDemInterv : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('AuthDemInterv', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('AuthDemInterv', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('AffListeProjet', 'AffListeProjet : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('AffListeProjet', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('AffListeProjet', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('ActivChargeSiteCli', 'ActivChargeSiteCli : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('ActivChargeSiteCli', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('ActivChargeSiteCli', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('AuthPlanningAssist', 'AuthPlanningAssist : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('AuthPlanningAssist', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('AuthPlanningAssist', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('AccesDirectPlanningAssist', 'AccesDirectPlanningAssist : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('AccesDirectPlanningAssist', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('AccesDirectPlanningAssist', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('VuePortailGlobal', 'VuePortailGlobal : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('VuePortailGlobal', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('VuePortailGlobal', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('ExpressCenter', 'ExpressCenter : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('ExpressCenter', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('ExpressCenter', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('CliDemSGEpson', 'CliDemSGEpson : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('CliDemSGEpson', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('CliDemSGEpson', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('AffLstClassification', 'AffLstClassification : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('AffLstClassification', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('AffLstClassification', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('AffDelais', 'AffDelais : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('AffDelais', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('AffDelais', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('AuthCloture', 'AuthCloture : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('AuthCloture', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('AuthCloture', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('AuthDepotDocs', 'AuthDepotDocs : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('AuthDepotDocs', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('AuthDepotDocs', 'non', true) }}</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('AuthVisuAttCmd', 'AuthVisuAttCmd : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('AuthVisuAttCmd', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('AuthVisuAttCmd', 'non', true) }}</div>
                    </div>
                   <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('AuthSwapNonEligible', 'AuthSwapNonEligible : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('AuthSwapNonEligible', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('AuthSwapNonEligible', 'non', true) }}</div>
                    </div>

                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('AuthTransporteur', 'AuthTransporteur : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('AuthTransporteur', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('AuthTransporteur', 'non', true) }}</div>
                    </div>

                    <div class="row">
                        <div class="cell" data-title="authorisation">{!! Form::label('AuthAffSousStatut', 'AuthAffSousStatut : ') !!}</div>
                        <div class="cell" data-title="oui">{{ Form::radio('AuthAffSousStatut', 'oui') }}</div>
                        <div class="cell" data-title="non">{{ Form::radio('AuthAffSousStatut', 'non', true) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <p class="champ-obligatoire">* : champ obligatoire</p>

        {!! Form::submit('Valider') !!}

    {!! Form::close() !!}


    </div>

@endsection
