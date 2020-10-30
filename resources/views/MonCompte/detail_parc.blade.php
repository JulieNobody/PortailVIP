@extends('Templates.template-popup')


@section('title')
Appareil n°{{$parc->NumSerie}}
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

    <h1 class="titrePopup">Détail appareil {{$parc->NumSerie}}</h1>


    <div class="detail">

            <div class="detail-titre">
                <h2>Client</h2>
                <div class="flecheContainer">
                    <img  class="close" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                </div>
            </div>

            <div class="aCacher" id="coordonnees_client" style="display: none">

                <div>
                    <h3>Client</h3>
                    <ul>
                        <li><span>Client :</span> {{$parc->Customer}}</li>
                        <li><span>Code client :</span> {{$parc->CodeCliFact}}</li>
                        <li><span>Nom projet :</span> {{$parc->NomProjet}}</li>
                    </ul>
                </div>

                <div>
                    <h3>Contrat</h3>
                    <ul>
                        <li><span>Contrat :</span> {{$parc->Contract}}</li>
                        <li><span>Statut :</span> {{$parc->Status}}</li>
                        <li><span>Date de début du contrat :</span> {{$parc->DateDebutContrat}}</li>
                        <li><span>Date de fin du contrat :</span> {{$parc->DateFinContrat}}</li>
                        <li><span>Date de fin de garantie :</span> {{$parc->DateFinGarantie}}</li>
                        <li><span>StartDate :</span> {{$parc->StartDate}}</li> {{--FIXME : a changer --}}
                    </ul>
                </div>
            </div>

            <div class="detail">

                <div class="detail-titre">
                    <h2>Appareil</h2>
                    <div class="flecheContainer">
                        <img  class="close" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                    </div>
                </div>

                <div class="aCacher" id="coordonnees_client" style="display: none">

                    <div>
                        <h3>Caractéristiques</h3>
                        <ul>
                            <li><span>Marque :</span> {{$parc->Marque}}</li>
                            <li><span>Modèle :</span> {{$parc->Model}}</li>
                            <li><span>Numéro de série :</span> {{$parc->NumSerie}}</li>
                            <li><span>Classification :</span> {{$parc->Classification}}</li>
                        </ul>
                    </div>

                    <div>
                        <h3>Emplacement</h3>
                        <ul>
                            <li><span>Adresse IP / Adresse Mac :</span> {{$parc->AdresseIP}} / {{$parc->MacAdress}}</li>
                            <li><span>Service :</span> {{$parc->Department}}</li>
                            <li><span>Lieu :</span> {{$parc->AddressName}}</li>
                            <li><span>Adresse :</span> {{$parc->PrinterAdress}}</li>
                            <li><span>Ville :</span> {{$parc->City}} {{$parc->PostalCode}}</li>
                            <li><span>Pays :</span> {{$parc->Country}}</li>
                        </ul>
                    </div>
                </div>

            <div class="detail-titre">
                <h2>Utilisateur</h2>
                <div class="flecheContainer">
                    <img  class="close" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                </div>
            </div>
            <div class="aCacher" id="detail_demande_client">
                <ul>
                    <li><span>CostCentre :</span> {{$parc->CostCentre}}</li>
                    <li><span>Utilisateur :</span> {{$parc->Contact}}</li>
                    <li><span>Téléphone :</span> {{$parc->Phone}}</li>
                    <li><span>Email :</span> {{$parc->Email}}</li>
                    <li><span>Propriétaire :</span> {{$parc->Owner}}</li>
                </ul>
            </div>
    </div>

@endsection
