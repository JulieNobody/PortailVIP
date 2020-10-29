@extends('Templates.template')


@section('title')
Admin - Détail utilisateur
@endsection



@section('contenu')

    <h1>Détail utilisateur : {{$user->NomUtil}}</h1>

    <div class="admin-crea-form">

        <fieldset>
            <legend>Général</legend>
            <ul>
                <li><span>ID :</span> {{$user->id}}</li>
                <li><span>Société :</span> {{$user->SocSiteVIP}}</li>
                <li><span>Code client :</span> {{$user->CodeUtil}}</li>
                <li><span>Nom client :</span> {{$user->NomUtil}}</li>
                <li><span>mot de passe (en clair) :</span> {{$user->PassUtil}}</li>
                <li><span>Date de la dernière modification du mot de passe :</span> {{$user->DateModifPass}}</li>
            </ul>

            <div class="tableau-auth">
                <div class="wrapper ">
                    <div class="table">
                        <div class="row header">
                            <div class="cell" data-title="Acces">Accès</div>
                            <div class="cell" data-title="oui">OUI</div>
                            <div class="cell" data-title="non">NON</div>
                        </div>

                        <div class="row">
                            <div class="cell" data-title="authorisation"><span>Voir les interventions :</span> </div>
                            @if($user->Acces[0] == 0)
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @else
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation"><span>Demander une intervention :</span> </div>
                            @if($user->Acces[1] == 0)
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @else
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation"><span>Pièces détachées :</span> </div>
                            @if($user->Acces[2] == 0)
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @else
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation"><span>Faire une demande au support :</span> </div>
                            @if($user->Acces[3] == 0)
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @else
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation"><span>Créer une actualité :</span> </div>
                            @if($user->Acces[4] == 0)
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @else
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation"><span>Voir "Mon Compte" :</span> </div>
                            @if($user->Acces[5] == 0)
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @else
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation"><span>Voir les factures :</span> </div>
                            @if($user->Acces[6] == 0)
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @else
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation"><span>Voir le parc :</span> </div>
                            @if($user->Acces[7] == 0)
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @else
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation"><span>Admin Maintronic :</span> </div>
                            @if($user->Acces[8] == 0)
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @else
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Contrat</legend>
            <ul>
                <li><span>Ag Contrat :</span> {{$user->AgContrat}}</li>
                <li><span>Auto menu 1 :</span> {{$user->automenu1}}</li>
                <li><span>Fonction :</span> {{$user->fonction}}</li>
                <li><span>LogoClient :</span>

                    @if ($user->LogoClient != NULL)
                        <img
                            id="admin-detail-logo"
                            src="{{ asset('images/logoClient/'. $user->LogoClient) }}"
                            alt="logo client"
                        >
                    @endif


                </li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>E-mails</legend>
            <ul>
                <li><span>AdMailContact :</span> {{$user->AdMailContact}}</li>
                <li><span>AdMailExped :</span> {{$user->AdMailExped}}</li>
                <li><span>AdMailCopie :</span> {{$user->AdMailCopie}}</li>
                <li><span>EnvMailCloture :</span> {{$user->EnvMailCloture}}</li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>Détails</legend>

            <ul>
                <li><span>DateDebEnvMail :</span> {{$user->DateDebEnvMail}}</li>
                <li><span>CodeCliFact :</span> {{$user->CodeCliFact}}</li>
                <li><span>DemIntervAffProjet :</span> {{$user->DemIntervAffProjet}}</li>
                <li><span>DemIntervAgMain :</span> {{$user->DemIntervAgMain}}</li>
                <li><span>DemIntervAgTrf :</span> {{$user->DemIntervAgTrf}}</li>
                <li><span>DateDebChargeSite :</span> {{$user->DateDebChargeSite}}</li>
                <li><span>AgPourEnvoiPieces :</span> {{$user->AgPourEnvoiPieces}}</li>
            </ul>

            <div class="tableau-auth">
                <div class="wrapper ">
                    <div class="table">
                        <div class="row header">
                            <div class="cell" data-title="authorisation">Authorisations</div>
                            <div class="cell" data-title="oui">OUI</div>
                            <div class="cell" data-title="non">NON</div>
                        </div>

                        <div class="row">
                            <div class="cell" data-title="authorisation">AuthDemInterv : </div>
                            @if($user->AuthDemInterv == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">AffListeProjet : </div>
                            @if($user->AffListeProjet == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">ActivChargeSiteCli : </div>
                            @if($user->ActivChargeSiteCli == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">AuthPlanningAssist : </div>
                            @if($user->AuthPlanningAssist == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">AccesDirectPlanningAssist : </div>
                            @if($user->AccesDirectPlanningAssist == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">VuePortailGlobal : </div>
                            @if($user->VuePortailGlobal == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">ExpressCenter : </div>
                            @if($user->ExpressCenter == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">CliDemSGEpson : </div>
                            @if($user->CliDemSGEpson == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">AffLstClassification : </div>
                            @if($user->AffLstClassification == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">AffDelais : </div>
                            @if($user->AffDelais == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">AuthCloture : </div>
                            @if($user->AuthCloture == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">AuthDepotDocs : </div>
                            @if($user->AuthDepotDocs == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="cell" data-title="authorisation">AuthVisuAttCmd : </div>
                            @if($user->AuthVisuAttCmd == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                       <div class="row">
                            <div class="cell" data-title="authorisation">AuthSwapNonEligible : </div>
                            @if($user->AuthSwapNonEligible == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="cell" data-title="authorisation">AuthTransporteur : </div>
                            @if($user->AuthTransporteur == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="cell" data-title="authorisation">AuthAffSousStatut : </div>
                            @if($user->AuthAffSousStatut == 'O')
                                <div class="cell" data-title="oui">X</div>
                                <div class="cell" data-title="non"></div>
                            @else
                                <div class="cell" data-title="oui"></div>
                                <div class="cell" data-title="non">X</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="boutonOrange">
            <a href="{{route('admin-modification-get', [$user->id])}}">Modifier l'utilisateur</a>
        </div>


    </div>

@endsection
