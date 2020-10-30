@extends('Templates.template-popup')


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
                {!! Form::label('CorrespInfo', 'Corespondant informatique* : ') !!}
                {!! Form::text('CorrespInfo', null, ['required' => 'required']) !!}
                {!! $errors->first('CorrespInfo', '<small >:message</small>') !!}

                {!! Form::label('TelCorrespInfo', 'Téléphone* : ') !!}
                {!! Form::text('TelCorrespInfo', null, ['required' => 'required']) !!}
                {!! $errors->first('TelCorrespInfo', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('CorrespInfoBis', 'Corespondant informatique bis : ') !!}
                {!! Form::text('CorrespInfoBis') !!}
                {!! $errors->first('CorrespInfoBis', '<small >:message</small>') !!}

                {!! Form::label('TelCorrespInfoBis', 'Téléphone : ') !!}
                {!! Form::text('TelCorrespInfoBis') !!}
                {!! $errors->first('TelCorrespInfoBis', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('Secretaire', 'Secretariat : ') !!}
                {!! Form::text('Secretaire') !!}
                {!! $errors->first('Secretaire', '<small >:message</small>') !!}

                {!! Form::label('TelSecretaire', 'Téléphone : ') !!}
                {!! Form::text('TelSecretaire') !!}
                {!! $errors->first('TelSecretaire', '<small >:message</small>') !!}
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
                {!! Form::label('RaisonSocialeCliDiv', 'Libellé / nom du site* : ') !!}
                {!! Form::text('RaisonSocialeCliDiv', null, ['required' => 'required', 'size' => '60','id' => 'site_nom']) !!}
                {!! $errors->first('RaisonSocialeCliDiv', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AdCliDiv', 'Adresse* : ') !!}
                {!! Form::text('AdCliDiv', null, ['required' => 'required', 'size' => '60','id' => 'site_adresse']) !!}
                {!! $errors->first('AdCliDiv', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('VilleCliDiv', 'Ville* : ') !!}
                {!! Form::text('VilleCliDiv', null, ['required' => 'required','id' => 'site_ville']) !!}
                {!! $errors->first('VilleCliDiv', '<small >:message</small>') !!}

                {!! Form::label('CPCliDiv', 'Code postal* : ') !!}
                {!! Form::text('CPCliDiv', null, ['required' => 'required','id' => 'site_cp']) !!}
                {!! $errors->first('CPCliDiv', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('TelCliDiv', 'Telephone* : ') !!}
                {!! Form::text('TelCliDiv', null, ['required' => 'required','id' => 'site_tel']) !!}
                {!! $errors->first('TelCliDiv', '<small >:message</small>') !!}

                {!! Form::label('FaxCliDiv', 'Fax : ') !!}
                {!! Form::text('FaxCliDiv') !!}
                {!! $errors->first('FaxCliDiv', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('MailCliDiv', 'Email : ') !!}
                {!! Form::email('MailCliDiv', auth()->user()->AdMailContact, ['required' => 'required']) !!}
                {!! $errors->first('MailCliDiv', '<small >:message</small>') !!}
            </div>



        </fieldset>

        <fieldset>
            <legend>Appareil</legend>
            <div>
                {!! Form::label('Interlocuteur', 'Utilisateur* : ') !!}
                {!! Form::text('Interlocuteur', null, ['required' => 'required']) !!}
                {!! $errors->first('Interlocuteur', '<small >:message</small>') !!}

                {!! Form::label('Service', 'Service, étage, bureau : ') !!}
                {!! Form::text('Service') !!}
                {!! $errors->first('Service', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('RefCli', 'Reference client : ') !!}
                {!! Form::text('RefCli') !!}
                {!! $errors->first('RefCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('Marque', 'Marque* : ') !!}
                {!! Form::text('Marque', null, ['required' => 'required']) !!}
                {!! $errors->first('Marque', '<small >:message</small>') !!}

                {!! Form::label('NumSerie', 'Numéro de serie* : ') !!}
                {!! Form::text('NumSerie', null, ['required' => 'required']) !!}
                {!! $errors->first('NumSerie', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('TypeApp', 'Type Appareil* : ') !!}
                {!! Form::text('TypeApp', null, ['required' => 'required']) !!}
                {!! $errors->first('TypeApp', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('Symptome', 'Probleme rencontré* : ') !!}
            </div>

            <div>
                {!! Form::textarea('Symptome', null, ['required' => 'required']) !!}
                {!! $errors->first('Symptome', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('Observ', 'Commentaire : ') !!}
            </div>

            <div>
                {!! Form::textarea('Observ') !!}
                {!! $errors->first('Observ', '<small >:message</small>') !!}
            </div>

        </fieldset>
        <p class="champ-obligatoire">* : champ obligatoire</p>


            {!! Form::submit('Valider') !!}

        {!! Form::close() !!}





    </div>

@endsection
