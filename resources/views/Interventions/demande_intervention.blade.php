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

    <div class="detail">



        {!! Form::open(['url' => 'demande_intervention','files' => 'true','enctype'=>'multipart/form-data']) !!}

        <fieldset>
            <legend>Client Facturation</legend>
            <div>
                {!! Form::label('NomFactCli', 'NomFactCli : ', ['class' => '#']) !!}
                {!! Form::text('NomFactCli', $defautNomFactCli, ['class' => '#']) !!}
                {!! $errors->first('NomFactCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AdFactCli', 'AdFactCli : ', ['class' => '#']) !!}
                {!! Form::text('AdFactCli', $defautAdFactCli, ['class' => '#']) !!}
                {!! $errors->first('AdFactCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('CPFactCli', 'CPFactCli : ', ['class' => '#']) !!}
                {!! Form::text('CPFactCli', $defautCPFactCli, ['class' => '#']) !!}
                {!! $errors->first('CPFactCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('VilleFactCli', 'VilleFactCli : ', ['class' => '#']) !!}
                {!! Form::text('VilleFactCli', $defautVilleFactCli, ['class' => '#']) !!}
                {!! $errors->first('VilleFactCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('InterlocFactCli', 'InterlocFactCli : ', ['class' => '#']) !!}
                {!! Form::text('InterlocFactCli', $defautInterlocFactCli, ['class' => '#']) !!}
                {!! $errors->first('InterlocFactCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('TelFactCli', 'TelFactCli : ', ['class' => '#']) !!}
                {!! Form::text('TelFactCli', $defautTelFactCli, ['class' => '#']) !!}
                {!! $errors->first('TelFactCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('FaxFactCli', 'FaxFactCli : ', ['class' => '#']) !!}
                {!! Form::text('FaxFactCli', $defautFaxFactCli, ['class' => '#']) !!}
                {!! $errors->first('FaxFactCli', '<small >:message</small>') !!}
            </div>

        </fieldset>

        <fieldset>
            <legend>Client Livraison</legend>
            <div>
                {!! Form::label('NomLivCli', 'NomLivCli : ', ['class' => '#']) !!}
                {!! Form::text('NomLivCli', $defautNomLivCli, ['class' => '#']) !!}
                {!! $errors->first('NomLivCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('AdLivCli', 'AdLivCli : ', ['class' => '#']) !!}
                {!! Form::text('AdLivCli', $defautAdLivCli, ['class' => '#']) !!}
                {!! $errors->first('AdLivCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('CPLivCli', 'CPLivCli : ', ['class' => '#']) !!}
                {!! Form::text('CPLivCli', $defautCPLivCli, ['class' => '#']) !!}
                {!! $errors->first('CPLivCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('VilleLivCli', 'VilleLivCli : ', ['class' => '#']) !!}
                {!! Form::text('VilleLivCli', $defautVilleLivCli, ['class' => '#']) !!}
                {!! $errors->first('VilleLivCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('InterlocLivCli', 'InterlocLivCli : ', ['class' => '#']) !!}
                {!! Form::text('InterlocLivCli', $defautInterlocLivCli, ['class' => '#']) !!}
                {!! $errors->first('InterlocLivCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('TelLivCli', 'TelLivCli : ', ['class' => '#']) !!}
                {!! Form::text('TelLivCli', $defautTelLivCli, ['class' => '#']) !!}
                {!! $errors->first('TelLivCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('FaxLivCli', 'FaxLivCli : ', ['class' => '#']) !!}
                {!! Form::text('FaxLivCli', $defautFaxLivCli, ['class' => '#']) !!}
                {!! $errors->first('FaxLivCli', '<small >:message</small>') !!}
            </div>



        </fieldset>

        <fieldset>
            <legend>Détail demande client</legend>
            <div>
                {!! Form::label('RefDossierCli', 'RefDossierCli : ', ['class' => '#']) !!}
                {!! Form::text('RefDossierCli', $defautRefDossierCli, ['class' => '#']) !!}
                {!! $errors->first('RefDossierCli', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('Marque', 'Marque : ', ['class' => '#']) !!}
                {!! Form::text('Marque', $defautMarque, ['class' => '#']) !!}
                {!! $errors->first('Marque', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('TypeApp', 'TypeApp : ', ['class' => '#']) !!}
                {!! Form::text('TypeApp', $defautTypeApp, ['class' => '#']) !!}
                {!! $errors->first('TypeApp', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('NumSerie', 'NumSerie : ', ['class' => '#']) !!}
                {!! Form::text('NumSerie', $defautNumSerie, ['class' => '#']) !!}
                {!! $errors->first('NumSerie', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('DateFinSG', 'DateFinSG : ', ['class' => '#']) !!}
                {!! Form::text('DateFinSG', $defautDateFinSG, ['class' => '#']) !!}
                {!! $errors->first('DateFinSG', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('DateEnr', 'DateEnr : ', ['class' => '#']) !!}
                {!! Form::text('DateEnr', $defautDateEnr, ['class' => '#']) !!}
                {!! $errors->first('DateEnr', '<small >:message</small>') !!}
            </div>
            <div>
                {!! Form::label('ligneDetail', 'ligneDetail : ', ['class' => '#']) !!}
                {!! Form::text('ligneDetail', $defautligneDetail, ['class' => '#']) !!}
                {!! $errors->first('ligneDetail', '<small >:message</small>') !!}
            </div>

        </fieldset>



            {!! Form::submit('Valider') !!}

        {!! Form::close() !!}





    </div>

@endsection
