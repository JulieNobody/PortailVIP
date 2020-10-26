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

        <fieldset>
            <legend>Demandeur : {{$user->NomUtil}}</legend>

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
                {{ Form::select('site_liste', $listeAdresse, ['id' => 'site_liste']) }}
            </div>



            <script>
                $(document).ready(function(){

                    let test = document.getElementById('test');
                    test.innerText = "toto2";

                    let siteListe = document.getElementById('site_liste');

                    let site_test = document.getElementById('site_test');

                    site_test.innerHTML = "<input type="site_test" name="site_test" id="site_test" value="John" required>";
                });
            </script>



            <p id="test">test</p>


            <p>Si vous ne trouvez pas votre site dans la liste, saissez les nouvelles données :</p>

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
                {!! Form::text('site_adresse', null, ['required' => 'required', 'size' => '100']) !!}
                {!! $errors->first('site_adresse', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('site_ville', 'Ville* : ') !!}
                {!! Form::text('site_ville', null, ['required' => 'required']) !!}
                {!! $errors->first('site_ville', '<small >:message</small>') !!}

                {!! Form::label('site_cp', 'Code postal* : ') !!}
                {!! Form::text('site_cp', null, ['required' => 'required']) !!}
                {!! $errors->first('site_cp', '<small >:message</small>') !!}
            </div>

            <div>
                {!! Form::label('site_tel', 'Telephone* : ') !!}
                {!! Form::text('site_tel', null, ['required' => 'required']) !!}
                {!! $errors->first('site_tel', '<small >:message</small>') !!}

                {!! Form::label('site_fax', 'Fax* : ') !!}
                {!! Form::text('site_fax', null, ['required' => 'required']) !!}
                {!! $errors->first('site_fax', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('site_email', 'Email* : ') !!}
                {!! Form::email('site_email', null, ['required' => 'required']) !!}
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
