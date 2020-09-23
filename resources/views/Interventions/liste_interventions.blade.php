@extends('Templates\template')

@section('contenu')

    <h1>Je suis la page LISTE INTERVENTION</h1>
    <div>



        <fieldset>
            <legend>Filtres</legend>
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
                        <p class="aucunResultat">Désolé, aucune sortie ne correspond à vôtre recherche</p>
                    @else

                        <tr>
                            <td><a href="#">{{$interventions}}</a></td>
                            <td>{{$interventions}}</td>
                            <td>{{$interventions}}</td>
                            <td>
                                <input type="checkbox" id="tab_inscrit" name="tab_inscrit" checked disabled="disabled">
                                <!-- if materiel non preté : <input type="checkbox" id="tab_inscrit" name="tab_inscrit" disabled="disabled"> -->
                            </td>
                            <td>{{$interventions}}</td>
                            <td>{{$interventions}}</td>
                            <td>{{$interventions}}</td>
                            <td><a href="#">{{$interventions}}</a></td>
                            <td>
                                <p>Documents</p>
                            </td>
                        </tr>

                    @endif


                    {{--@endforeach--}}
                </table>
            </div>
        </section>

        <div class="boutonNouvelleIntervention">
            <a href="#">Demander une intervention</a>
        </div>

    </div>


@endsection
