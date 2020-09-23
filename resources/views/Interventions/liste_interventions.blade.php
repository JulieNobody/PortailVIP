@extends('Templates\template')

@section('contenu')
    <h1>Je suis la page LISTE INTERVENTION</h1>
  <!--  <div>



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
                    {#AFFICHER LES SORTIE AVEC UN ETAT CREE QUE POUR L ORGANISATEUR#}
                {% for sortie in listeSorties %}
                    {% if sortie.organisateur.id != app.user.id and sortie.etat.id == 1%}
                    {% elseif sortie.etat.id == 7 %}
                    {% else %}
                    <tr>
                        <td><a href="{{path('sortie_afficheSortie', { id: sortie.id } ) }}" class="nomSortie">{{ sortie.nom }}</a></td>
                        <td>Le {{ sortie.dateHeureDebut | date('d/m/Y') }} à {{ sortie.dateHeureDebut | date('H') }}h{{ sortie.dateHeureDebut | date('i') }}</td>
                        <td>Le {{ sortie.dateLimiteInscription | date('d/m/Y') }} à {{ sortie.dateLimiteInscription | date('H') }}h{{ sortie.dateLimiteInscription | date('i') }}</td>
                        <td>
                            {{ sortie.participants | length }} / {{ sortie.nbInscriptionsMax }}
                            {% if sortie.participants | length >= sortie.nbInscriptionsMax%}Complet !{% endif %}
                        </td>
                        <td>{{ sortie.etat.libelle }}</td>
                        <td>
                            {% if app.user in sortie.participants%}
                                <input type="checkbox" id="tab_inscrit" name="tab_inscrit" checked disabled="disabled">
                            {% else %}
                                <input type="checkbox" id="tab_inscrit" name="tab_inscrit" disabled="disabled">
                            {% endif %}
                        </td>
                        <td><a href="{{path('user_detailProfil', { id: sortie.organisateur.id } ) }}" title="Profil de {{ sortie.organisateur.username }}" class="organisateur">{{ sortie.organisateur.username }}</a></td>

                        <td>
                            <p>Documents</p>
                        </td>
                    </tr>
                    {% endif %}
                {% else %}
                    <p class="aucunResultat">Désolé, aucune sortie ne correspond à vôtre recherche</p>
                {% endfor %}
                </table>
            </div>
        </section>

        <div class="boutonNouvelleIntervention">
            <a href="#">Demander une intervention</a>
        </div>

    </div>
-->
@endsection
