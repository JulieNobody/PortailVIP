@extends('Templates\template')


@section('title')
Mon compte
@endsection



@section('contenu')

    <h1>Mon compte</h1>

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

        <fieldset>
            <legend>Parc</legend>
            <div class="wrapper">
                <div class="table">
                    <div class="row header">
                        <div class="cell" data-title="NoAppareil">No Appareil</div>
                        <div class="cell" data-title="Type">Type</div>
                        <div class="cell" data-title="Marque">Marque</div>
                        <div class="cell" data-title="Modele">Modèle</div>
                        <div class="cell" data-title="DateMiseService">Date mise en service</div>
                        <div class="cell" data-title="Garantie">Garantie</div>
                    </div>

                    {{-- @if(count($documents) == 0)
                        </div>
                            <p class="aucunResultat" >
                                Aucun document
                            </p>
                    @else --}}

                    {{-- @foreach ($docuements as $d) --}}

                    <div class="row">
                        <div class="cell" data-title="NoAppareil"><a href="">AP98000665</a></div>
                        <div class="cell" data-title="Type">Laptop</div>
                        <div class="cell" data-title="Marque">Lenovo</div>
                        <div class="cell" data-title="Modele">LN 5008</div>
                        <div class="cell" data-title="DateMiseService">01/09/2018</div>
                        <div class="cell" data-title="Garantie"></div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="NoAppareil"><a href="">AP98000678</a></div>
                        <div class="cell" data-title="Type">Imprimante</div>
                        <div class="cell" data-title="Marque">Epson</div>
                        <div class="cell" data-title="Modele">EP 6789</div>
                        <div class="cell" data-title="DateMiseService">17/01/2015</div>
                        <div class="cell" data-title="Garantie">X</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="NoAppareil"><a href="">AP98000645</a></div>
                        <div class="cell" data-title="Type">Smartphone</div>
                        <div class="cell" data-title="Marque">Samsung</div>
                        <div class="cell" data-title="Modele">SG 4567</div>
                        <div class="cell" data-title="DateMiseService">18/06/2020</div>
                        <div class="cell" data-title="Garantie">X</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="NoAppareil"><a href="">AP98000645</a></div>
                        <div class="cell" data-title="Type">Laptop</div>
                        <div class="cell" data-title="Marque">Lenovo</div>
                        <div class="cell" data-title="Modele">LN 5009</div>
                        <div class="cell" data-title="DateMiseService">25/01/2018</div>
                        <div class="cell" data-title="Garantie"></div>
                    </div>
                    {{-- @endforeach

                    @endif --}}
                </div>
            </div>

        </fieldset>

        <fieldset>
            <legend>Factures</legend>
            <div class="wrapper">
                <div class="table">
                    <div class="row header">
                        <div class="cell" data-title="NoFacture">No Facture</div>
                        <div class="cell" data-title="Date">Date</div>
                        <div class="cell" data-title="Libelle">Libellé</div>
                        <div class="cell" data-title="Montant">Montant</div>
                        <div class="cell" data-title="Payee">Payée</div>
                        <div class="cell" data-title="Télécharger">Télécharger</div>
                    </div>

                    {{-- @if(count($documents) == 0)
                        </div>
                            <p class="aucunResultat" >
                                Aucun document
                            </p>
                    @else --}}

                    {{-- @foreach ($docuements as $d) --}}

                    <div class="row">
                        <div class="cell" data-title="NoFacture"><a href="">FA45000067</a></div>
                        <div class="cell" data-title="Date">01/09/2020</div>
                        <div class="cell" data-title="Libelle">Abonnement maintenance</div>
                        <div class="cell" data-title="Montant">2756,50 €</div>
                        <div class="cell" data-title="Payee"></div>
                        <div class="cell" data-title="Télécharger">X</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="NoFacture"><a href="">FA45000066</a></div>
                        <div class="cell" data-title="Date">01/08/2020</div>
                        <div class="cell" data-title="Libelle">Abonnement maintenance</div>
                        <div class="cell" data-title="Montant">2756,50 €</div>
                        <div class="cell" data-title="Payee"></div>
                        <div class="cell" data-title="Télécharger">X</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="NoFacture"><a href="">FA45000065</a></div>
                        <div class="cell" data-title="Date">18/07/2020</div>
                        <div class="cell" data-title="Libelle">Devis No DV678765</div>
                        <div class="cell" data-title="Montant">768,67 €</div>
                        <div class="cell" data-title="Payee">X</div>
                        <div class="cell" data-title="Télécharger">X</div>
                    </div>
                    <div class="row">
                        <div class="cell" data-title="NoFacture"><a href="">FA45000064</a></div>
                        <div class="cell" data-title="Date">01/07/2020</div>
                        <div class="cell" data-title="Libelle">Abonnement maintenance</div>
                        <div class="cell" data-title="Montant">2756,50 €</div>
                        <div class="cell" data-title="Payee">X</div>
                        <div class="cell" data-title="Télécharger">X</div>
                    </div>
                    {{-- @endforeach

                    @endif --}}
                </div>
            </div>

        </fieldset>

    </div>

@endsection

