@extends('Templates\template-popup')


@section('title')
Demande d'intervention
@endsection



@section('contenu')


<script type="text/javascript">
    $(document).ready(function(){

        $('.detail-titre').click(function(){
            $(this).nextAll('.aCacher').eq(0).slideToggle(250);
            $(this).find('img').toggleClass("close open");
        });

    });
</script>



    <h1 class="titrePopup">Demande d'intervention</h1>

    <div class="admin-crea-form">

        {!! Form::open(['route' => 'demandeInterventionPost', 'method' => 'post']) !!}

        {{ csrf_field() }}
        <fieldset>
            <legend>Demandeur : {{auth()->user()->NomUtil}}</legend>

            <div>
                {!! Form::label('cores_info_nom', 'Corespondant informatique* : ') !!}
                {!! Form::text('cores_info_nom', null, ['required' => 'required']) !!}
                {!! $errors->first('cores_info_nom', '<small >:message</small>') !!}

                {!! Form::label('cores_info_tel', 'Téléphone* : ') !!}
                {!! Form::text('cores_info_tel', null, ['required' => 'required']) !!}
                {!! $errors->first('cores_info_tel', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('cores_info_bis_nom', 'Corespondant informatique bis* : ') !!}
                {!! Form::text('cores_info_bis_nom', null, ['required' => 'required']) !!}
                {!! $errors->first('cores_info_bis_nom', '<small >:message</small>') !!}

                {!! Form::label('cores_info_bis_tel', 'Téléphone* : ') !!}
                {!! Form::text('cores_info_bis_tel', null, ['required' => 'required']) !!}
                {!! $errors->first('cores_info_bis_tel', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('secretariat_nom', 'Secretariat* : ') !!}
                {!! Form::text('secretariat_nom', null, ['required' => 'required']) !!}
                {!! $errors->first('secretariat_nom', '<small >:message</small>') !!}

                {!! Form::label('secretariat_tel', 'Téléphone* : ') !!}
                {!! Form::text('secretariat_tel', null, ['required' => 'required']) !!}
                {!! $errors->first('secretariat_tel', '<small >:message</small>') !!}
            </div>
        </fieldset>

        <fieldset>
            <legend>Site</legend>

            <div>
                {!! Form::label('site_liste', 'Liste des sites : ') !!}
                {{ Form::select('site_liste', $listeAdresse,$listeAdresse->id = 0, ['id' => 'site_liste']) }}
            </div>

            <script>
                $(document).ready(function(){
                    $("#site_liste").on('change', function run() {

                       //Je récupère l'ID associé à l'adresse du select
                        var idVille = $("#site_liste").val();



                        $.ajax({
                            url : "getInterventionSite",
                            type : 'POST',
                            dataType   :'json',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {
                                'idVille': idVille
                                },

                        }).done(function(data, textStatus) {

                            $("#site_nom").val("");
                            $("#site_adresse").val("");
                            $("#site_ville").val("");
                            $("#site_cp").val("");
                            $("#site_tel").val("");
                            $("#site_fax").val("");

                            $("#site_nom").val(data.inter.NomLivCli);
                            $("#site_adresse").val(data.inter.AdLivCli);
                            $("#site_ville").val(data.inter.VilleLivCli);
                            $("#site_cp").val(data.inter.CPLivCli);
                            $("#site_tel").val(data.inter.TelLivCli);
                            $("#site_fax").val(data.inter.FaxLivCli);

                        }).fail(function(textStatus, errorThrown) {
                            $("#site_nom").val("");
                            $("#site_adresse").val("");
                            $("#site_ville").val("");
                            $("#site_cp").val("");
                            $("#site_tel").val("");
                            $("#site_fax").val("");
                        });

                    })
                });
            </script>


            <p id="sortie_lieu">Si vous ne trouvez pas votre site dans la liste, saissez les nouvelles données :</p>

            <div>
                {!! Form::label('site_nom', 'Nom* : ') !!}
                {!! Form::text('site_nom', null, ['required' => 'required', 'size' => '100','id' => 'site_nom']) !!}
                {!! $errors->first('site_nom', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('site_libelle', 'Libellé* : ') !!}
                {!! Form::text('site_libelle', null, ['required' => 'required', 'size' => '100']) !!}
                {!! $errors->first('site_libelle', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('site_adresse', 'Adresse* : ') !!}
                {!! Form::text('site_adresse', null, ['required' => 'required', 'size' => '100','id' => 'site_adresse']) !!}
                {!! $errors->first('site_adresse', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('site_ville', 'Ville* : ') !!}
                {!! Form::text('site_ville', null, ['required' => 'required','id' => 'site_ville']) !!}
                {!! $errors->first('site_ville', '<small >:message</small>') !!}

                {!! Form::label('site_cp', 'Code postal* : ') !!}
                {!! Form::text('site_cp', null, ['required' => 'required','id' => 'site_cp']) !!}
                {!! $errors->first('site_cp', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('site_tel', 'Telephone* : ') !!}
                {!! Form::text('site_tel', null, ['required' => 'required','id' => 'site_tel']) !!}
                {!! $errors->first('site_tel', '<small >:message</small>') !!}

                {!! Form::label('site_fax', 'Fax* : ') !!}
                {!! Form::text('site_fax', null, ['required' => 'required','id' => 'site_fax']) !!}
                {!! $errors->first('site_fax', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('site_email', 'Email* : ') !!}
                {!! Form::email('site_email', auth()->user()->AdMailContact, ['required' => 'required']) !!}
                {!! $errors->first('site_email', '<small >:message</small>') !!}
            </div>



        </fieldset>

        <fieldset>
            <legend>Appareil</legend>
            <div>
                {!! Form::label('app_utilisateur', 'Utilisateur* : ') !!}
                {!! Form::text('app_utilisateur', null, ['required' => 'required']) !!}
                {!! $errors->first('app_utilisateur', '<small >:message</small>') !!}

                {!! Form::label('app_bureau', 'Service, étage, bureau* : ') !!}
                {!! Form::text('app_bureau', null, ['required' => 'required']) !!}
                {!! $errors->first('app_bureau', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('app_reference_client', 'Reference client* : ') !!}
                {!! Form::text('app_reference_client', null, ['required' => 'required']) !!}
                {!! $errors->first('app_reference_client', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('app_marque', 'Marque* : ') !!}
                {!! Form::text('app_marque', null, ['required' => 'required']) !!}
                {!! $errors->first('app_marque', '<small >:message</small>') !!}

                {!! Form::label('app_no_serie', 'Numéro de serie* : ') !!}
                {!! Form::text('app_no_serie', null, ['required' => 'required']) !!}
                {!! $errors->first('app_no_serie', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('app_designation', 'Désignation* : ') !!}
                {!! Form::text('app_designation', null, ['required' => 'required']) !!}
                {!! $errors->first('app_designation', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('probleme', 'Probleme rencontré* : ') !!}
            </div>

            <div>
                {!! Form::textarea('probleme', null, ['required' => 'required']) !!}
                {!! $errors->first('probleme', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('commentaire', 'Commentaire : ') !!}
            </div>

            <div>
                {!! Form::textarea('commentaire') !!}
                {!! $errors->first('commentaire', '<small >:message</small>') !!}
            </div>

        </fieldset>
        <p class="champ-obligatoire">* : champ obligatoire</p>


            {!! Form::submit('Valider') !!}

        {!! Form::close() !!}





    </div>

@endsection
