@extends('Templates\template')


@section('title')
Mon compte
@endsection



@section('contenu')

<script type="text/javascript">
    $(document).ready(function(){

        $('.detail-titre').click(function(){
            $(this).nextAll('.aCacher').eq(0).slideToggle(250);
            $(this).find('img').toggleClass("close open");
        });



        $('#resetFiltresFactures').click(function(){
            $("#valeurDateMinFactures").val("");
            $("#valeurDateMaxFactures").val("");
            $("#valeurRechercheFactures").val("");
        });


    });





</script>


    <h1>Mon compte</h1>

    <div class="detail">


            <div class="detail-titre">
                <h2>Général</h2>
                <div class="flecheContainer">
                    <img  class="close" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                </div>
            </div>
            <div class="aCacher">
                <ul>
                    <li><strong>ID :</strong> {{$user->id}}</li>
                    <li><strong>Société :</strong> {{$user->SocSiteVIP}}</li>
                    <li><strong>Code client :</strong> {{$user->CodeUtil}}</li>
                    <li><strong>Nom client :</strong> {{$user->NomUtil}}</li>
                    <li><strong>mot de passe (en crypté) :</strong> {{$user->PassUtil}}</li>
                    <li><strong>Admin (1 pour oui, 0 pour non) :</strong> {{$user->Admin}}</li>
                </ul>
            </div>

            <div class="detail-titre">
                <h2>Contrat</h2>
                <div class="flecheContainer">
                    <img  class="close" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                </div>
            </div>
            <div class="aCacher">
                <ul>
                    <li>Ag Contrat (non null) : {{$user->AgContrat}}</li>
                    <li>Auto menu 1 : {{$user->automenu1}}</li>
                    <li>Fonction : {{$user->fonction}}</li>
                    <li>DateModifPass : {{$user->DateModifPass}}</li>
                    <li>Nouveau LogoClient : </li>
                </ul>
            </div>


            <div class="detail-titre">
                <h2>E-mails</h2>
                <div class="flecheContainer">
                    <img  class="close" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                </div>
            </div>
            <div class="aCacher">
                <ul>
                    <li>AdMailContact (non null) : {{$user->AdMailContact}}</li>
                    <li>AdMailExped (non null) : {{$user->AdMailExped}}</li>
                    <li>AdMailCopie (non null) : {{$user->AdMailCopie}}</li>
                    <li>EnvMailCloture (non null) : {{$user->EnvMailCloture}}</li>
                </ul>
            </div>

            <div class="detail-titre">
                <h2>Détails</h2>
                <div class="flecheContainer">
                    <img  class="close" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                </div>
            </div>
            <div class="aCacher">
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
            </div>

            <div class="detail-titre">
                <h2>Parc</h2>
                <div class="flecheContainer">
                    <img  class="close" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                </div>
            </div>
            <div class="aCacher">
                <fieldset class="fieldset-liste-inter">
                    <div class="filtresContainer">
                        <form action="" method="get" class="form-example">
                            @csrf
                        <!-- ------------ MOT CLE ------------  -->
                        <div class="block-filtre">
                            <input id="valeurDateMaxParc" type="text" placeholder="N° de série, marque, type..." name="valeurMotCle" value="">
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
                            <div class="cell" data-title="NomProjet">Nom projet</div>
                            <div class="cell" data-title="TypeAppareil">Type appareil</div>
                            <div class="cell" data-title="Marque">Marque</div>
                            <div class="cell" data-title="Classification">Classification</div>
                            <div class="cell" data-title="DateDebutContrat">Date début contrat</div>
                            <div class="cell" data-title="DateFinContrat">Date fin contrat</div>
                            <div class="cell" data-title="DateFinGarantie">Date fin garantie</div>
                        </div>

                        {{-- @if(count($documents) == 0)
                            </div>
                                <p class="aucunResultat" >
                                    Aucun document
                                </p>
                        @else --}}

                        {{-- @foreach ($docuements as $d) --}}

                        <div class="row">
                            <div class="cell" data-title="NomProjet"><a href="">PR6789665</a></div>
                            <div class="cell" data-title="TypeAppareil">Laptop</div>
                            <div class="cell" data-title="Marque">Lenovo</div>
                            <div class="cell" data-title="Classification">LN 5008</div>
                            <div class="cell" data-title="DateDebutContrat">01/09/2018</div>
                            <div class="cell" data-title="DateFinContrat">01/09/2021</div>
                            <div class="cell" data-title="DateFinGarantie">01/09/2019</div>
                        </div>
                        <div class="row">
                            <div class="cell" data-title="NomProjet"><a href="">PR6789665</a></div>
                            <div class="cell" data-title="TypeAppareil">Smartphone</div>
                            <div class="cell" data-title="Marque">Samsung</div>
                            <div class="cell" data-title="Classification">S6</div>
                            <div class="cell" data-title="DateDebutContrat">06/10/2020</div>
                            <div class="cell" data-title="DateFinContrat">01/09/2021</div>
                            <div class="cell" data-title="DateFinGarantie">06/10/2022</div>
                        </div>
                        <div class="row">
                            <div class="cell" data-title="NomProjet"><a href="">PR6789665</a></div>
                            <div class="cell" data-title="TypeAppareil">Laptop</div>
                            <div class="cell" data-title="Marque">Lenovo</div>
                            <div class="cell" data-title="Classification">LN 7009</div>
                            <div class="cell" data-title="DateDebutContrat">12/09/2020</div>
                            <div class="cell" data-title="DateFinContrat">01/09/2021</div>
                            <div class="cell" data-title="DateFinGarantie">12/09/2021</div>
                        </div>
                        <div class="row">
                            <div class="cell" data-title="NomProjet"><a href="">PR6789665</a></div>
                            <div class="cell" data-title="TypeAppareil">Imprimante</div>
                            <div class="cell" data-title="Marque">Epson</div>
                            <div class="cell" data-title="Classification">EP 6785</div>
                            <div class="cell" data-title="DateDebutContrat">30/03/2017</div>
                            <div class="cell" data-title="DateFinContrat">01/09/2021</div>
                            <div class="cell" data-title="DateFinGarantie">30/03/2018</div>
                        </div>
                        <div class="row">
                            <div class="cell" data-title="NomProjet"><a href="">PR6789665</a></div>
                            <div class="cell" data-title="TypeAppareil">Tablette</div>
                            <div class="cell" data-title="Marque">Mac</div>
                            <div class="cell" data-title="Classification">I Pad 6</div>
                            <div class="cell" data-title="DateDebutContrat">15/11/2019</div>
                            <div class="cell" data-title="DateFinContrat">01/09/2021</div>
                            <div class="cell" data-title="DateFinGarantie">15/11/2020</div>
                        </div>
                        {{-- @endforeach

                        @endif --}}
                    </div>
                </div>
            </div>

            <div class="detail-titre">
                <h2>Factures</h2>
                <div class="flecheContainer">
                    <img  class="close" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                </div>
            </div>
            <div class="aCacher">
                <fieldset class="fieldset-liste-inter">
                    <div class="filtresContainer">
                        <form action="" method="get" class="form-example">
                            @csrf
                         <!-- ------------ DATES ------------  -->
                        <div class="block-filtre" id="bloc-dates">

                            <div>
                                <label for="date_debut">Du</label>
                                <input id="valeurDateMinFactures" class="filtre-date-input" type="date" name="date-min" value="">
                            </div>
                            <div>
                                <label for="date_debut">Au</label>
                                <input id="valeurDateMaxFactures" class="filtre-date-input" type="date" name="date-max" value="">
                            </div>

                        </div>
                        <!-- ------------ MOT CLE ------------  -->
                        <div class="block-filtre">
                            <input id="valeurRechercheFactures" type="text" placeholder="Numéro ou montant" name="valeurMotCle" value="">
                        </div>

                        <!-- ------------ BOUTON ------------  -->
                        <div >
                            <button class="boutonFiltre" type="submit">Rechercher</button>
                            <input class="boutonFiltre" type="button" id="resetFiltresFactures" value="Réinitialiser">
                        </div>

                    </form>

                    </div>
                </fieldset>
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
            </div>


    </div>

@endsection

