@extends('Templates\template')


@section('title')
Mes interventions
@endsection



@section('contenu')

    <h1>Mes interventions</h1>
    <div>

        <fieldset>
            <div id="filtresContainer">
                <!-- ------------ DATES ------------  -->
                <div class="block-filtre" id="bloc-dates">
                    <div>
                        <label for="date_debut">Du</label>
                        <input class="filtre-date-input" type="date">
                    </div>
                    <div>
                        <label for="date_debut">Au</label>
                        <input class="filtre-date-input" type="date">
                    </div>
                </div>

                <!-- ------------ STATUT ------------  -->
                <div class="block-filtre block-checkbox">


                    <div class="check-en-cours">
                        <input type="checkbox" id="en-cours" name="en-cours" onchange="checkbox()" checked><br>
                        <label id="label-en-cours" for="en-cours" class="label-statut">En cours</label>
                    </div>
                    <div class="check-devis">
                        <input type="checkbox" id="devis" name="devis" onchange="checkbox()"><br>
                        <label id="label-devis" for="devis" class="label-statut">En attente</label><br>
                        <label id="label-devis2" for="devis" class="label-statut-L2">(réponse au devis)</label>
                    </div>
                    <div class="check-termine">
                        <input type="checkbox" id="termine" name="termine" onchange="checkbox()"><br>
                        <label id="label-termine" for="termine" class="label-statut">Terminée</label>
                    </div>

                </div>

                <!-- ------------ MOT CLE ------------  -->
                <div class="block-filtre">
                    <input type="text" placeholder="MOT CLÉ">
                </div>

                <!-- ------------ BOUTON ------------  -->
                <div class="boutonFiltre">
                    <a href="#">Rechercher</a>
                </div>
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
                Num Client
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
                    <a href="">{{$i->NumInt}}</a>
                </div>
                <div class="cell" data-title="Ref client">
                    {{$i->RefDossierCli}}
                </div>
                <div class="cell" data-title="Statut">

                    {{$i->statut->DesignStatutCli}}

                </div>
                <div class="cell" data-title="Prêt matériel">
                    <input type="checkbox" id="tab_inscrit" name="tab_inscrit" checked disabled="disabled">
                </div>
                <div class="cell" data-title="Matériel">
                    {{$i->Marque}} / {{$i->TypeApp}}
                </div>
                <div class="cell" data-title="Problème">
                    @foreach ($i->ligneDet as $l)
                        {{$l->DesignArt}}
                    @endforeach

                </div>
                <div class="cell" data-title="Date demande">
                    {{$i->DateEnr}}
                </div>
                <div class="cell" data-title="Lieu">
                    {{$i->AdLivCli}}
                    {{$i->CPLivCli}}
                    {{$i->VilleLivCli}}
                </div>
                <div class="cell" data-title="Documents">
                    <a href="#">Documents</a>
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
            <a href="#">Demander une intervention</a>
        </div>


    </div>


@endsection
