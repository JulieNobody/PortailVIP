@extends('Templates.template')


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
    function PopupCentrer(page) {
    let largeur = screen.width*0.6;
    let hauteur = screen.height*0.7;
    let top=(screen.height-hauteur)/2;
    let left=(screen.width-largeur)/2;

    window.open(
                page,
                "Détail Parc",
                "top="+top+",left="+left+",width="+largeur+",height="+hauteur+",menubar=no,scrollbars=no,statusbar=no"
            );

}
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
                    <li><strong>mot de passe (en clair) :</strong> {{$user->PassUtil}}</li>
                    <li><strong>Date de la dernière modification du mot de passe :</strong> {{$user->DateModifPass}}</li>
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
                    <li>Ag Contrat : {{$user->AgContrat}}</li>
                    <li>Fonction : {{$user->fonction}}</li>
                    <li>DateModifPass : {{$user->DateModifPass}}</li>
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
                    <li>AdMailContact : {{$user->AdMailContact}}</li>
                    <li>AdMailExped : {{$user->AdMailExped}}</li>
                    <li>AdMailCopie : {{$user->AdMailCopie}}</li>
                    <li>EnvMailCloture : {{$user->EnvMailCloture}}</li>
                </ul>
            </div>

            @if (auth()->user()->Acces[7] == 1)
                <div class="detail-titre" id="monParc">
                    <h2>Parc</h2>
                    <div class="flecheContainer">
                    <img  class="{{$cssImgParc}}" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                    </div>
                </div>
            <div class="aCacher" style="{{$cssParc}}">
                    <fieldset class="fieldset-liste-inter">
                        <div class="filtresContainer">
                            <form action="{{route('mon-compte-parc-filtres').'#monParc'}}" method="get" class="form-example">
                                @csrf
                            <!-------------- MOT CLE -------------->
                            <div class="block-filtre">
                            <input id="valeurDateMaxParc" type="text" placeholder="N° de série, marque, type..." name="valeurMotCle" value="{{$motcle}}">
                            </div>

                            <!-------------- BOUTON -------------->
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
                                <div class="cell cellMateriel" data-title="Materiel">Matériel</div>
                                <div class="cell cellAdresse" data-title="Adresse">Adresse</div>
                                <div class="cell cellDates" data-title="DateDebutContrat">Date début contrat</div>
                                <div class="cell cellDates" data-title="DateFinContrat">Date fin contrat</div>
                                <div class="cell cellDates" data-title="DateFinGarantie">Date fin garantie</div>
                            </div>

                            @if(count($Parc) == 0)
                                </div>
                                    <p class="aucunResultat" >
                                        Aucun document
                                    </p>

                            @else

                            @foreach ($Parc as $p)

                            <div class="row">

                                <div class="cell" data-title="NomProjet">
                                        <p>{{$p->CodeCliFact}}</p>
                                        <p>{{$p->NomProjet}}</p>
                                </div>
                                <div class="cell" data-title="Materiel">
                                    <a href="" onclick=PopupCentrer('{{route('detailParc',[$p->id])}}')>
                                        <p> {{$p->Marque}}</p>
                                        <p> {{$p->Model}}</p>
                                        <p> {{$p->NumSerie}}</p>
                                    </a>
                                </div>

                                <div class="cell" data-title="Adresse">
                                    <p> {{$p->AddressName}}</p>
                                    <p> {{$p->PrinterAdress}}</p>
                                    <p> {{$p->PostalCode}} {{$p->City}}</p>

                                </div>
                                <div class="cell" data-title="DateDebutContrat">{{$p->DateDebutContrat}}</div>
                                <div class="cell" data-title="DateFinContrat">{{$p->DateFinContrat}}</div>
                                <div class="cell" data-title="DateFinGarantie">{{$p->DateFinGarantie}}</div>
                            </div>

                             @endforeach
                        </div>
                        @endif

                        @if(count($Parc) != 0)
                            <div id="voirPlusContainer">
                                <div id="voirPlus" style="{{$voirPlus}}">
                                    <a href="{{route('mon-compte-parc-filtres').'?page=2#monParc'}}"> - En voir plus - </a>
                                </div>
                            </div>
                            <div style="{{$cssLinks}}">
                                {{ $Parc->links("pagination::default") }}
                            </div>
                        @endif

                    </div>
                </div>
            @endif

            @if (auth()->user()->Acces[6] == 1)
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
            @endif


    </div>

@endsection

