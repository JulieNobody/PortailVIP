@extends('Templates\template')


@section('title')
Mes interventions
@endsection



@section('contenu')


    <SCRIPT LANGUAGE="JavaScript">
        function PopupCentrer(page) {
            let largeur = screen.width*0.6;
            let hauteur = screen.height*0.7;
            let top=(screen.height-hauteur)/2;
            let left=(screen.width-largeur)/2;

            window.open(
                        page,
                        "Détail Intervention",
                        "top="+top+",left="+left+",width="+largeur+",height="+hauteur+",menubar=no,scrollbars=no,statusbar=no"
                    );

        }


        $(document).ready(function(){

            $('#resetFiltres').click(function(){

                $("#valeurDateMin").val("");
                $("#valeurDateMax").val("");

                $("#en-cours").prop("checked", false);
                $("#devis").prop("checked", false);
                $("#termine").prop("checked", false);
                checkbox();

                $("#valeurRecherche").val("");


            });

        });


    </SCRIPT>



<h1>Mes interventions </h1>

    <div>

        <fieldset class="fieldset-liste-inter">
            <div class="filtresContainer">
                <form action="{{route('interventionsFiltrees')}}" method="get" class="form-example" id="formFiltres">

                    @csrf

                <!-- ------------ DATES ------------  -->
                <div class="block-filtre" id="bloc-dates">

                    <div>
                        <label for="date_debut">Du</label>
                        <input id="valeurDateMin" class="filtre-date-input" type="date" name="date-min" value="{{$dateMin}}">
                    </div>
                    <div>
                        <label for="date_debut">Au</label>
                        <input id="valeurDateMax" class="filtre-date-input" type="date" name="date-max" value="{{$dateMax}}">
                    </div>

                </div>


                <!-- ------------ STATUT ------------  -->
                <div class="block-filtre block-checkbox">

                    <div class="check-en-cours">
                        <input type="checkbox" id="en-cours" name="cb-en-cours" onchange="checkbox()" {{$enCours}}><br>
                        <label id="label-en-cours" for="en-cours" class="label-statut">En cours</label>
                    </div>
                    <div class="check-devis">
                        <input type="checkbox" id="devis" name="cb-en-attente" onchange="checkbox()" {{$enAttente}}><br>
                        <label id="label-devis" for="devis" class="label-statut">En attente</label><br>
                        <label id="label-devis2" for="devis" class="label-statut-L2">(réponse au devis)</label>
                    </div>
                    <div class="check-termine">
                        <input type="checkbox" id="termine" name="cb-terminee" onchange="checkbox()" {{$terminee}}><br>
                        <label id="label-termine" for="termine" class="label-statut">Terminée</label>
                    </div>

                </div>


                <!-- ------------ MOT CLE ------------  -->
                <div class="block-filtre">
                    <input id="valeurRecherche" type="text" placeholder="MOT CLÉ" name="valeurMotCle" value="{{$motcle}}">
                </div>

                <!-- ------------ BOUTON ------------  -->
                <div id="boutonsFiltres" >
                    <button class="boutonFiltre" type="submit">Rechercher</button>
                    <input class="boutonFiltre" type="button" id="resetFiltres" value="Réinitialiser">
                </div>

            </form>

            </div>
        </fieldset>


    <!--------------------------------------------- Tableau interventions ----------------------------------->


    <div class="wrapper">

        <div class="table">

          <div class="row header">

            <div class="cell" data-title="Numéro">
                Numéro
            </div>
            <div class="cell" data-title="Ref client">
                Ref Client
            </div>
            <div class="cell" data-title="Statut">
                Statut
            </div>
            <div class="cell" data-title="Prêt matériel">
                Prêt matériel
            </div>
            <div class="cell" data-title="Matériel">
                Matériel
            </div>
            <div class="cell" data-title="Problème">
                Problème
            </div>
            <div class="cell" data-title="Date demande">
                Date demande
            </div>
            <div class="cell" data-title="Lieu">
                Lieu
            </div>
            <div class="cell" data-title="Documents">
                Documents
            </div>

          </div>

            {{-- @foreach ($listeInterventions as $interventions) --}}

            @if(count($interventions) == 0)
                </div>
                    <p class="aucunResultat" >
                        Aucune intervention ne correspond à vôtre recherche
                    </p>
            @else

            @foreach ($interventions as $i)

            <div class="row">
                <div class="cell" data-title="Numéro">
                    <a href="#" onclick=PopupCentrer('{{route('detailIntervention',[$i->id])}}')>{{$i->NumInt}}</a>

                </div>
                <div class="cell" data-title="Ref client">
                    {{$i->RefDossierCli}}
                </div>
                <div class="cell" data-title="Statut">

                    {{$i->statut->DesignStatutCli}}

                </div>
                <div class="cell" data-title="Prêt matériel">
                @if($i->statut->Statut == 'NPRET' || ($i->statut->DesignStatutCli == 'Terminée' && $i->DateRetourPret > $today->toDateString() ) )
                        <input type="checkbox" id="tab_inscrit" name="tab_inscrit" checked disabled="disabled">
                    @else
                        <input type="checkbox" id="tab_inscrit" name="tab_inscrit"  disabled="disabled">
                    @endif
                </div>
                <div class="cell" data-title="Matériel">
                    <p class="marque">{{$i->Marque}}</p>
                    <p class="typeapp">{{$i->TypeApp}}</p>
                    <p class="numserie">{{$i->NumSerie}}</p>
                </div>
                <div class="cell cellProbleme" data-title="Problème">

                    @if($i->Observ == null)
                        <p>- Détail du problème non renseigné -</p>
                    @else
                        @if (strlen($i->Observ) > 150)
                            <p class="probleme" title="{{utf8_encode($i->Observ)}}">{{substr(utf8_encode($i->Observ), 0, 150)."..."}}</p>
                        @else
                            <p class="probleme" title="{{utf8_encode($i->Observ)}}">{{substr(utf8_encode($i->Observ), 0, 150)}}</p>
                        @endif
                    @endif

                </div>
                <div class="cell" data-title="Date demande">
                    {{$i->DateEnr->format('d-m-Y')}}
                </div>
                <div class="cell" data-title="Lieu">
                    <p class="adresse">{{$i->AdLivCli}}</p>
                    <p class="ville">{{$i->CPLivCli}} {{$i->VilleLivCli}}</p>
                </div>
                <div class="cell" data-title="Documents">
                    @if (auth()->user()->Acces[8] == 1)
                    <a href="{{ asset('documents/BISIGNE.pdf') }}" target="_blank" title="BISIGNE.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>
                    <a href="{{ asset('documents/EXEMPLECLIENT.pdf') }}" target="_blank" title="EXEMPLECLIENT.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>
                    <a href="{{ asset('documents/FEUILLEETAT.pdf') }}" target="_blank" title="FEUILLEETAT.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>
                    <a href="{{ asset('documents/STATUSENGINE.pdf') }}" target="_blank" title="STATUSENGINE.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>
                    <a href="{{ asset('documents/ENQSATISF.pdf') }}" target="_blank" title="ENQSATISF.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>
                    <a href="{{ asset('documents/EXCLUGAR.pdf') }}" target="_blank" title="EXCLUGAR.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>
                    <a href="{{ asset('documents/PVINST.pdf') }}" target="_blank" title="PVINST.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>
                    @else
                        @if(count($i->user->userDoc) == 0)
                            <p>Aucun document disponible</p>
                        @else
                        @foreach ($i->user->userDoc as $td)
                            @if($td->TypeDoc == "BISIGNE" )<a href="{{ asset('documents/BISIGNE.pdf') }}" target="_blank" title="BISIGNE.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>@endif
                            @if($td->TypeDoc == "EXEMPLECLIENT" )<a href="{{ asset('documents/EXEMPLECLIENT.pdf') }}" target="_blank" title="EXEMPLECLIENT.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>@endif
                            @if($td->TypeDoc == "FEUILLEETAT" )<a href="{{ asset('documents/FEUILLEETAT.pdf') }}" target="_blank" title="FEUILLEETAT.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>@endif
                            @if($td->TypeDoc == "STATUSENGINE" )<a href="{{ asset('documents/STATUSENGINE.pdf') }}" target="_blank" title="STATUSENGINE.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>@endif
                            @if($td->TypeDoc == "ENQSATISF" )<a href="{{ asset('documents/ENQSATISF.pdf') }}" target="_blank" title="ENQSATISF.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>@endif
                            @if($td->TypeDoc == "EXCLUGAR" )<a href="{{ asset('documents/EXCLUGAR.pdf') }}" target="_blank" title="EXCLUGAR.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>@endif
                            @if($td->TypeDoc == "PVINST" )<a href="{{ asset('documents/PVINST.pdf') }}" target="_blank" title="PVINST.pdf"><img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}"></a>@endif
                        @endforeach
                        @endif
                    @endif
                </div>
            </div>

            @endforeach

            @endif

        </div>

        @if($interventions)
            {{ $interventions->links("pagination::default") }}
        @endif

      </div>

    <!--------------------------------------------- Bouton nouvelle intervention ----------------------------------->

        <div class="boutonOrange">
            <a href="#" onclick=PopupCentrer('{{route('demandeInterventionGet')}}')>Demander une intervention</a>
        </div>


    </div>


@endsection
