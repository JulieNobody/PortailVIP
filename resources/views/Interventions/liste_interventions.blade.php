@extends('Templates\template')

@section('contenu')

    <h1>Mes interventions</h1>
    <div>



        <fieldset>
            <div id="filtresContainer">
                <label for="Recherche">Recherche</label>
                <input type="text">

                <div class="boutonOrange">
                    <a href="#">Rechercher</a>
                </div>
            </div>
        </fieldset>

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
                                <!-- if materiel non preté : <input type="checkbox" id="tab_inscrit" name="tab_inscrit" disabled="disabled"> -->
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

        <div class="boutonOrange">
            <a href="#">Demander une intervention</a>
        </div>

    </div>


@endsection
