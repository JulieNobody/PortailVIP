@extends('Templates.template-popup')


@section('title')
Intervention n°{{$intervention->NumInt}}
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



    <h1 class="titrePopup">Détail intervention {{$intervention->NumInt}}</h1>

    <div class="detail">

            <div class="detail-titre">
                <h2>Coordonnées client</h2>
                <div class="flecheContainer">
                    <img  class="close" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                </div>
            </div>

            <div class="aCacher" id="coordonnees_client" style="display: none">
                <div>
                    <h3>Client Facturation</h3>
                    <ul>
                        <li><span>Nom client :</span> {{$intervention->NomFactCli}}</li>
                        <li><span>Adresse :</span> {{$intervention->AdFactCli}}</li>
                        <li><span>Code Postal :</span> {{$intervention->CPFactCli}}</li>
                        <li><span>Ville :</span> {{$intervention->VilleFactCli}}</li>
                        <li><span>Interlocuteur :</span> {{$intervention->InterlocFactCli}}</li>
                        <li><span>Tel :</span> {{$intervention->TelFactCli}}</li>
                        <li><span>Fax :</span> {{$intervention->FaxFactCli}}</li>
                    </ul>
                </div>
                <div>
                    <h3>Client Livraison</h3>
                    <ul>
                        <li><span>Nom client :</span> {{$intervention->NomLivCli}}</li>
                        <li><span>Adresse :</span> {{$intervention->AdLivCli}}</li>
                        <li><span>Code Postal :</span> {{$intervention->CPLivCli}}</li>
                        <li><span>Ville :</span> {{$intervention->VilleLivCli}}</li>
                        <li><span>Interlocuteur :</span> {{$intervention->InterlocLivCli}}</li>
                        <li><span>Tel :</span> {{$intervention->TelLivCli}}</li>
                        <li><span>Fax :</span> {{$intervention->FaxLivCli}}</li>
                    </ul>
                </div>
            </div>



            <div class="detail-titre">
                <h2>Détail demande client</h2>
                <div class="flecheContainer">
                    <img  class="close" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                </div>
            </div>
            <div class="aCacher" id="detail_demande_client">
                <ul>
                    <li><span>Référence client :</span> {{$intervention->RefDossierCli}}</li>
                    <li><span>Marque :</span> {{$intervention->Marque}}</li>
                    <li><span>Type Appareil :</span> {{$intervention->TypeApp}}</li>
                    <li><span>Numéro de série :</span> {{$intervention->NumSerie}}</li>
                    <li><span>Date fin garantie :</span> {{$intervention->DateFinSG}}</li>
                    <li><span>Date enregistrement :</span> {{$intervention->DateEnr->format('d-m-Y')}}</li>
                    <li><span>Problème rencontré :</span> {{utf8_encode($intervention->Observ)}}</li>
                </ul>
            </div>


            <div class="detail-titre">
                <h2>Détail visites</h2>
                <div class="flecheContainer">
                    <img  class="close" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                </div>
            </div>
            <div class="aCacher" id="detail_visites">
                <ul>
                    <li><span>Date début intervention :</span> {{$intervention->DateDebInterv}}</li>
                    <li><span>Date fin intervention :</span> {{$intervention->DateFinInterv}}</li>

                    <li><span> Travaux effectués :</span></li>
                    @if(count($intervention->ligneDet) > 0)
                        <ul>
                            @foreach ($intervention->ligneDet->sortBy('Numligne') as $d)
                                <li class="trv"> {{$d->DesignArt}}</li>
                            @endforeach
                        </ul>
                        @else
                        <p>Aucun travail notifié pour le moment</p>
                    @endif

                </ul>
            </div>


            <div class="detail-titre">
                <h2>Documents associés</h2>
                <div class="flecheContainer">
                    <img  class="close" src="{{ asset('images/fleche_section.png')}}" alt="fleche a cliquer">
                </div>
            </div>
            <div class="aCacher" id="documents_associes">
                <div class="wrapper">
                    <div class="table">
                        <div class="row header">
                            <div class="cell" data-title="NomDocument">
                                Nom document
                            </div>
                            <div class="cell" data-title="Date">
                                Date
                            </div>
                            <div class="cell" data-title="Heure">
                                Heure
                            </div>
                        </div>

                        {{-- @if(count($documents) == 0)
                            </div>
                                <p class="aucunResultat" >
                                    Aucun document
                                </p>
                        @else --}}

                        {{-- @foreach ($docuements as $d) --}}
                        @if (auth()->user()->Acces[8] == 1)

                            <div class="row">
                                <div class="cell" data-title="NomDocument">
                                    <a href="{{ asset('documents/BISIGNE.pdf') }}" target="_blank" title="BISIGNE.pdf">
                                        <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                        <p>BISIGNE.pdf</p>
                                    </a>
                                </div>
                                <div class="cell" data-title="Date">
                                    date du doc
                                </div>
                                <div class="cell" data-title="Heure">
                                    heure du doc
                                </div>
                            </div>

                            <div class="row">
                                <div class="cell" data-title="NomDocument">
                                    <a href="{{ asset('documents/EXEMPLECLIENT.pdf') }}" target="_blank" title="EXEMPLECLIENT.pdf">
                                        <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                        <p>EXEMPLECLIENT.pdf</p>
                                    </a>
                                </div>
                                <div class="cell" data-title="Date">
                                    date du doc
                                </div>
                                <div class="cell" data-title="Heure">
                                    heure du doc
                                </div>
                            </div>

                            <div class="row">
                                <div class="cell" data-title="NomDocument">
                                    <a href="{{ asset('documents/FEUILLEETAT.pdf') }}" target="_blank" title="FEUILLEETAT.pdf">
                                        <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                        <p>FEUILLEETAT.pdf</p>
                                    </a>
                                </div>
                                <div class="cell" data-title="Date">
                                    date du doc
                                </div>
                                <div class="cell" data-title="Heure">
                                    heure du doc
                                </div>
                            </div>

                            <div class="row">
                                <div class="cell" data-title="NomDocument">
                                    <a href="{{ asset('documents/STATUSENGINE.pdf') }}" target="_blank" title="STATUSENGINE.pdf">
                                        <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                        <p>STATUSENGINE.pdf</p>
                                    </a>
                                </div>
                                <div class="cell" data-title="Date">
                                    date du doc
                                </div>
                                <div class="cell" data-title="Heure">
                                    heure du doc
                                </div>
                            </div>

                            <div class="row">
                                <div class="cell" data-title="NomDocument">
                                    <a href="{{ asset('documents/ENQSATISF.pdf') }}" target="_blank" title="ENQSATISF.pdf">
                                        <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                        <p>ENQSATISF.pdf</p>
                                    </a>
                                </div>
                                <div class="cell" data-title="Date">
                                    date du doc
                                </div>
                                <div class="cell" data-title="Heure">
                                    heure du doc
                                </div>
                            </div>

                            <div class="row">
                                <div class="cell" data-title="NomDocument">
                                    <a href="{{ asset('documents/EXCLUGAR.pdf') }}" target="_blank" title="EXCLUGAR.pdf">
                                        <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                        <p>EXCLUGAR.pdf</p>
                                    </a>
                                </div>
                                <div class="cell" data-title="Date">
                                    date du doc
                                </div>
                                <div class="cell" data-title="Heure">
                                    heure du doc
                                </div>
                            </div>

                            <div class="row">
                                <div class="cell" data-title="NomDocument">
                                    <a href="{{ asset('documents/PVINST.pdf') }}" target="_blank" title="PVINST.pdf">
                                        <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                        <p>PVINST.pdf</p>
                                    </a>
                                </div>
                                <div class="cell" data-title="Date">
                                    date du doc
                                </div>
                                <div class="cell" data-title="Heure">
                                    heure du doc
                                </div>
                            </div>

                        @else
                            @if(count($intervention->user->userDoc) == 0)
                                <p>Aucun document disponible</p>
                            @else
                            @foreach ($intervention->user->userDoc as $td)

                            @if($td->TypeDoc == "BISIGNE" )
                                <div class="row">
                                    <div class="cell" data-title="NomDocument">
                                        <a href="{{ asset('documents/BISIGNE.pdf') }}" target="_blank" title="BISIGNE.pdf">
                                            <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                            <p>BISIGNE.pdf</p>
                                        </a>
                                    </div>
                                    <div class="cell" data-title="Date">
                                        date du doc
                                    </div>
                                    <div class="cell" data-title="Heure">
                                        heure du doc
                                    </div>
                                </div>
                            @endif

                            @if($td->TypeDoc == "EXEMPLECLIENT" )
                                <div class="row">
                                    <div class="cell" data-title="NomDocument">
                                        <a href="{{ asset('documents/EXEMPLECLIENT.pdf') }}" target="_blank" title="EXEMPLECLIENT.pdf">
                                            <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                            <p>EXEMPLECLIENT.pdf</p>
                                        </a>
                                    </div>
                                    <div class="cell" data-title="Date">
                                        date du doc
                                    </div>
                                    <div class="cell" data-title="Heure">
                                        heure du doc
                                    </div>
                                </div>
                            @endif

                            @if($td->TypeDoc == "FEUILLEETAT" )
                                <div class="row">
                                    <div class="cell" data-title="NomDocument">
                                        <a href="{{ asset('documents/FEUILLEETAT.pdf') }}" target="_blank" title="FEUILLEETAT.pdf">
                                            <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                            <p>FEUILLEETAT.pdf</p>
                                        </a>
                                    </div>
                                    <div class="cell" data-title="Date">
                                        date du doc
                                    </div>
                                    <div class="cell" data-title="Heure">
                                        heure du doc
                                    </div>
                                </div>
                            @endif

                            @if($td->TypeDoc == "STATUSENGINE" )
                                <div class="row">
                                    <div class="cell" data-title="NomDocument">
                                        <a href="{{ asset('documents/STATUSENGINE.pdf') }}" target="_blank" title="STATUSENGINE.pdf">
                                            <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                            <p>STATUSENGINE.pdf</p>
                                        </a>
                                    </div>
                                    <div class="cell" data-title="Date">
                                        date du doc
                                    </div>
                                    <div class="cell" data-title="Heure">
                                        heure du doc
                                    </div>
                                </div>
                            @endif

                            @if($td->TypeDoc == "ENQSATISF" )
                                <div class="row">
                                    <div class="cell" data-title="NomDocument">
                                        <a href="{{ asset('documents/ENQSATISF.pdf') }}" target="_blank" title="ENQSATISF.pdf">
                                            <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                            <p>ENQSATISF.pdf</p>
                                        </a>
                                    </div>
                                    <div class="cell" data-title="Date">
                                        date du doc
                                    </div>
                                    <div class="cell" data-title="Heure">
                                        heure du doc
                                    </div>
                                </div>
                            @endif

                            @if($td->TypeDoc == "EXCLUGAR" )
                                <div class="row">
                                    <div class="cell" data-title="NomDocument">
                                        <a href="{{ asset('documents/EXCLUGAR.pdf') }}" target="_blank" title="EXCLUGAR.pdf">
                                            <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                            <p>EXCLUGAR.pdf</p>
                                        </a>
                                    </div>
                                    <div class="cell" data-title="Date">
                                        date du doc
                                    </div>
                                    <div class="cell" data-title="Heure">
                                        heure du doc
                                    </div>
                                </div>
                            @endif

                            @if($td->TypeDoc == "PVINST" )
                                <div class="row">
                                    <div class="cell" data-title="NomDocument">
                                        <a href="{{ asset('documents/PVINST.pdf') }}" target="_blank" title="PVINST.pdf">
                                            <img class="icon_tab" src="{{ asset('images/PDF_file_icon.svg') }}">
                                            <p>PVINST.pdf</p>
                                        </a>
                                    </div>
                                    <div class="cell" data-title="Date">
                                        date du doc
                                    </div>
                                    <div class="cell" data-title="Heure">
                                        heure du doc
                                    </div>
                                </div>
                            @endif

                        @endforeach
                        @endif
                    @endif
                        {{-- @endforeach

                        @endif --}}
                    </div>
                </div>
            </div>



    </div>

@endsection
