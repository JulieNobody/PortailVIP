@extends('Templates\template')


@section('title')
Admin - Modification utilisateur
@endsection



@section('contenu')

    <h1>Modification utilisateur : {{$user->NomUtil}}</h1>

    <div class="admin-crea-form">


        {!! Form::open(['url' => 'admin-modification','files' => 'true','enctype'=>'multipart/form-data']) !!}

        <fieldset>
            <legend>Général</legend>
            <div>
                {!! Form::label('id', 'ID : ', ['class' => '#']) !!}
                {!! Form::text('id', $user->id, ['class' => '#','readonly']) !!}
                {!! $errors->first('id', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('SocSiteVIP', 'Société : ') !!}
                {!! Form::text('SocSiteVIP', $user->SocSiteVIP) !!}
                {!! $errors->first('SocSiteVIP', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('CodeUtil', 'Code client : ') !!}
                {!! Form::text('CodeUtil', $user->CodeUtil) !!}
                {!! $errors->first('CodeUtil', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('NomUtil', 'Nom client : ') !!}
                {!! Form::text('NomUtil', $user->NomUtil) !!}
                {!! $errors->first('NomUtil', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('PassUtil', 'Mot de passe (en clair) : ') !!}
                {!! Form::text('PassUtil', $user->PassUtil_clair) !!}
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
                            @if($user->Acces[0] == 0)
                                <div class="cell" data-title="oui">{{ Form::radio('voirInter', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('voirInter', 'non', true) }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('voirInter', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('voirInter', 'non') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('demandeInter', 'Demander une intervention : ') !!}</div>
                            @if($user->Acces[1] == 0)
                                <div class="cell" data-title="oui">{{ Form::radio('demandeInter', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('demandeInter', 'non', true) }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('demandeInter', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('demandeInter', 'non') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('piecesDetachees', 'Pièces détachées : ') !!}</div>
                            @if($user->Acces[2] == 0)
                                <div class="cell" data-title="oui">{{ Form::radio('piecesDetachees', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('piecesDetachees', 'non', true) }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('piecesDetachees', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('piecesDetachees', 'non') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('demandeSupport', 'Faire une demande au support : ') !!}</div>
                            @if($user->Acces[3] == 0)
                                <div class="cell" data-title="oui">{{ Form::radio('demandeSupport', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('demandeSupport', 'non', true) }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('demandeSupport', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('demandeSupport', 'non') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('creationActu', 'Créer une actualité : ') !!}</div>
                            @if($user->Acces[4] == 0)
                                <div class="cell" data-title="oui">{{ Form::radio('creationActu', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('creationActu', 'non', true) }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('creationActu', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('creationActu', 'non') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('monCompte', 'Voir "Mon Compte" : ') !!}</div>
                            @if($user->Acces[5] == 0)
                                <div class="cell" data-title="oui">{{ Form::radio('monCompte', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('monCompte', 'non', true) }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('monCompte', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('monCompte', 'non') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('voirFactures', 'Voir les factures : ') !!}</div>
                            @if($user->Acces[6] == 0)
                                <div class="cell" data-title="oui">{{ Form::radio('voirFactures', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('voirFactures', 'non', true) }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('voirFactures', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('voirFactures', 'non') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('voirParc', 'Voir le parc : ') !!}</div>
                            @if($user->Acces[7] == 0)
                                <div class="cell" data-title="oui">{{ Form::radio('voirParc', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('voirParc', 'non', true) }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('voirParc', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('voirParc', 'non') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('AdminMaintronic', 'Admin Maintronic : ') !!}</div>
                            @if($user->Acces[8] == 0)
                                <div class="cell" data-title="oui">{{ Form::radio('AdminMaintronic', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AdminMaintronic', 'non', true) }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('AdminMaintronic', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AdminMaintronic', 'non') }}</div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

        </fieldset>

        <fieldset>
            <legend>Contrat</legend>
            <div>
                {!! Form::label('AgContrat', 'Ag Contrat* (4 caractère) : ') !!}
                {!! Form::text('AgContrat', $user->AgContrat, ['required' => 'required']) !!}
                {!! $errors->first('AgContrat', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('automenu1', 'Auto menu 1* : ') !!}
                {!! Form::text('automenu1', $user->automenu1, ['required' => 'required']) !!}
                {!! $errors->first('automenu1', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('fonction', 'Fonction : ') !!}
                {!! Form::text('fonction', $user->fonction) !!}
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
                {!! Form::email('AdMailContact', $user->AdMailContact, ['required' => 'required']) !!}
                {!! $errors->first('AdMailContact', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AdMailExped', 'AdMailExped* : ') !!}
                {!! Form::email('AdMailExped', $user->AdMailExped, ['required' => 'required']) !!}
                {!! $errors->first('AdMailExped', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AdMailCopie', 'AdMailCopie* : ') !!}
                {!! Form::email('AdMailCopie', $user->AdMailCopie, ['required' => 'required']) !!}
                {!! $errors->first('AdMailCopie', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('EnvMailCloture', 'EnvMailCloture* : ') !!}
                {!! Form::email('EnvMailCloture', $user->EnvMailCloture, ['required' => 'required']) !!}
                {!! $errors->first('EnvMailCloture', '<small >:message</small>') !!}
            </div>
        </fieldset>

        <fieldset>
            <legend>Détails</legend>
            <div>
                {!! Form::label('DateDebEnvMail', 'DateDebEnvMail* : ') !!}
                {!! Form::date('DateDebEnvMail', $user->DateDebEnvMail, ['required' => 'required']) !!}
                {!! $errors->first('DateDebEnvMail', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('CodeCliFact', 'CodeCliFact* : ') !!}
                {!! Form::text('CodeCliFact', $user->CodeCliFact, ['required' => 'required']) !!}
                {!! $errors->first('CodeCliFact', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('DemIntervAffProjet', 'DemIntervAffProjet* : ') !!}
                {!! Form::text('DemIntervAffProjet', $user->DemIntervAffProjet, ['required' => 'required']) !!}
                {!! $errors->first('DemIntervAffProjet', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('DemIntervAgMain', 'DemIntervAgMain* (4 caractère) : ') !!}
                {!! Form::text('DemIntervAgMain', $user->DemIntervAgMain, ['required' => 'required']) !!}
                {!! $errors->first('DemIntervAgMain', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('DemIntervAgTrf', 'DemIntervAgTrf* (4 caractère) : ') !!}
                {!! Form::text('DemIntervAgTrf', $user->DemIntervAgTrf, ['required' => 'required']) !!}
                {!! $errors->first('DemIntervAgTrf', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('DateDebChargeSite', 'DateDebChargeSite* : ') !!}
                {!! Form::date('DateDebChargeSite', $user->DateDebChargeSite, ['required' => 'required']) !!}
                {!! $errors->first('DateDebChargeSite', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('AgPourEnvoiPieces', 'AgPourEnvoiPieces* (4 caractère : ') !!}
                {!! Form::text('AgPourEnvoiPieces', $user->AgPourEnvoiPieces, ['required' => 'required']) !!}
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
                            @if($user->AuthDemInterv == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('AuthDemInterv', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthDemInterv', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('AuthDemInterv', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthDemInterv', 'non', true) }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('AffListeProjet', 'AffListeProjet : ') !!}</div>
                            @if($user->AffListeProjet == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('AffListeProjet', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AffListeProjet', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('AffListeProjet', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AffListeProjet', 'non', true) }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('ActivChargeSiteCli', 'ActivChargeSiteCli : ') !!}</div>
                            @if($user->ActivChargeSiteCli == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('ActivChargeSiteCli', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('ActivChargeSiteCli', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('ActivChargeSiteCli', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('ActivChargeSiteCli', 'non', true) }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('AuthPlanningAssist', 'AuthPlanningAssist : ') !!}</div>
                            @if($user->AuthPlanningAssist == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('AuthPlanningAssist', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthPlanningAssist', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('AuthPlanningAssist', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthPlanningAssist', 'non', true) }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('AccesDirectPlanningAssist', 'AccesDirectPlanningAssist : ') !!}</div>
                            @if($user->AccesDirectPlanningAssist == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('AccesDirectPlanningAssist', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AccesDirectPlanningAssist', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('AccesDirectPlanningAssist', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AccesDirectPlanningAssist', 'non', true) }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('VuePortailGlobal', 'VuePortailGlobal : ') !!}</div>
                            @if($user->VuePortailGlobal == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('VuePortailGlobal', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('VuePortailGlobal', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('VuePortailGlobal', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('VuePortailGlobal', 'non', true) }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('ExpressCenter', 'ExpressCenter : ') !!}</div>
                            @if($user->ExpressCenter == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('ExpressCenter', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('ExpressCenter', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('ExpressCenter', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('ExpressCenter', 'non', true) }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('CliDemSGEpson', 'CliDemSGEpson : ') !!}</div>
                            @if($user->CliDemSGEpson == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('CliDemSGEpson', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('CliDemSGEpson', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('CliDemSGEpson', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('CliDemSGEpson', 'non', true) }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('AffLstClassification', 'AffLstClassification : ') !!}</div>
                            @if($user->AffLstClassification == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('AffLstClassification', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AffLstClassification', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('AffLstClassification', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AffLstClassification', 'non', true) }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('AffDelais', 'AffDelais : ') !!}</div>
                            @if($user->AffDelais == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('AffDelais', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AffDelais', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('AffDelais', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AffDelais', 'non', true) }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('AuthCloture', 'AuthCloture : ') !!}</div>
                            @if($user->AuthCloture == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('AuthCloture', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthCloture', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('AuthCloture', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthCloture', 'non', true) }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('AuthDepotDocs', 'AuthDepotDocs : ') !!}</div>
                            @if($user->AuthDepotDocs == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('AuthDepotDocs', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthDepotDocs', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('AuthDepotDocs', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthDepotDocs', 'non', true) }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('AuthVisuAttCmd', 'AuthVisuAttCmd : ') !!}</div>
                            @if($user->AuthVisuAttCmd == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('AuthVisuAttCmd', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthVisuAttCmd', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('AuthVisuAttCmd', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthVisuAttCmd', 'non', true) }}</div>
                            @endif
                        </div>
                       <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('AuthSwapNonEligible', 'AuthSwapNonEligible : ') !!}</div>
                            @if($user->AuthSwapNonEligible == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('AuthSwapNonEligible', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthSwapNonEligible', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('AuthSwapNonEligible', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthSwapNonEligible', 'non', true) }}</div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('AuthTransporteur', 'AuthTransporteur : ') !!}</div>
                            @if($user->AuthTransporteur == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('AuthTransporteur', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthTransporteur', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('AuthTransporteur', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthTransporteur', 'non', true) }}</div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="cell" data-title="authorisation">{!! Form::label('AuthAffSousStatut', 'AuthAffSousStatut : ') !!}</div>
                            @if($user->AuthAffSousStatut == 'O')
                                <div class="cell" data-title="oui">{{ Form::radio('AuthAffSousStatut', 'oui', true) }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthAffSousStatut', 'non') }}</div>
                            @else
                                <div class="cell" data-title="oui">{{ Form::radio('AuthAffSousStatut', 'oui') }}</div>
                                <div class="cell" data-title="non">{{ Form::radio('AuthAffSousStatut', 'non', true) }}</div>
                            @endif
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
