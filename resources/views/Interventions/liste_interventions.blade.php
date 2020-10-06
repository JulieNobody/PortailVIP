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
                        <input type="checkbox" id="en-cours" name="en-cours" onchange="checkbox()"><br>
                        <label id="label-en-cours" for="en-cours" class="label-statut">En cours</label>
                    </div>
                    <div class="check-devis">
                        <input type="checkbox" id="devis" name="devis" onchange="checkbox()"><br>
                        <label id="label-devis" for="devis" class="label-statut">En attente</label><br>
                        <label id="label-devis2" for="devis" class="label-statut-L2">(réponse au devis)</label>
                    </div>
                    <div class="check-termine">
                        <input type="checkbox" id="termine" name="termine" onchange="checkbox()"><br>
                        <label id="label-termine" for="termine" class="label-statut">Terminé</label>
                    </div>

                </div>

                <!-- ------------ MOT CLE ------------  -->
                <div class="block-filtre">
                    <input type="text" placeholder="MOT CLÉ">
                </div>

                <!-- ------------ BOUTON ------------  -->
                <div class="boutonOrange">
                    <a href="#">Rechercher</a>
                </div>
            </div>
        </fieldset>

        <!--
        <section id="tableauAccueil">
            <div class="header_tab">
                <table>
                    <tr>
                        <th>Numéro</th>
                        <th>Ref client</th>
                        <th>Statut</th>
                        <th>Prêt matériel</th>
                        <th>Matériel</th>
                        <th>Problème</th>
                        <th>Date demande</th>
                        <th>Lieu</th>
                        <th>Documents</th>
                    </tr>
                </table>
            </div>

            <div class="contenu_tab">
                <table>

                    {{-- @foreach ($listeInterventions as $interventions) --}}

                    @if(empty($interventions))
                    <tr>
                        <td><p class="aucunResultat">Aucune intervention ne correspond à vôtre recherche</p></td>

                        </tr>
                    @else

                        @foreach ($interventions as $i)

                        <tr>
                            <td><a href="#">{{$i->NumInt}}</a></td>
                            <td>{{$i->RefDossierCli}}</td>
                            <td>{{$i->StatutInterv}}</td>
                            <td>
                                <input type="checkbox" id="tab_inscrit" name="tab_inscrit" checked disabled="disabled">

                            </td>
                            <td>{{$i->TypeApp}}</td>
                            <td>TO DO probleme</td>
                            <td>{{$i->DateEnr}}</td>
                            <td>{{$i->VilleLivCli}}</td>
                            <td><a href="#">Documents</a></td>
                        </tr>

                        @endforeach

                    @endif


                    {{--@endforeach--}}
                </table>
            </div>
        </section>
    -->

    <!--------------------------------------------- Tableau interventions ----------------------------------->


    <div class="wrapper">

        <div class="table">

          <div class="row header">

            <div class="cell" data-title="Numéro">
                Numéro
            </div>
            <div class="cell" data-title="Ref client">
                Ref client
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

            @if(empty($interventions))

            <div class="row">
                <div class="cell">
                    Aucune intervention ne correspond à vôtre recherche
                </div>
            </div>

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
                    {{$i->StatutInterv}}
                </div>
                <div class="cell" data-title="Prêt matériel">
                    <input type="checkbox" id="tab_inscrit" name="tab_inscrit" checked disabled="disabled">
                </div>
                <div class="cell" data-title="Matériel">
                    {{$i->TypeApp}}
                </div>
                <div class="cell" data-title="Problème">
                    TO DO probleme
                </div>
                <div class="cell" data-title="Date demande">
                    {{$i->DateEnr}}
                </div>
                <div class="cell" data-title="Lieu">
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
