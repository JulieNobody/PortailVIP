<!DOCTYPE html>
<html>
    <head>
        <title> @yield('title')</title>
        <link href="{!! asset('../resources/css/app.css') !!}" rel="stylesheet" type="text/css" >
        <link href="{!! asset('../resources/css/header-footer.css') !!}" rel="stylesheet" type="text/css" >
    </head>

    <body>
        <div id="fond-blanc-page">

        <header>



            <img id="logo" src="{!! asset('/images/logo-maintronic.png') !!}" alt="logo Maintronic">

            <nav>
                <a href="#">
                    <img class="icon-menu" src="{!! asset('/images/icon-cle-bleu.png') !!}" alt="icone interventions"><br>
                    Interventions
                </a>
                <a href="#">
                    <img class="icon-menu" src="{!! asset('/images/icon-caddie-bleu.png') !!}" alt="icone pièces détachées"><br>
                    Pièces détachées
                </a>
                <a href="#">
                    <img class="icon-menu" src="{!! asset('/images/icon-casque-bleu.png') !!}" alt="icone support"><br>
                    Support
                </a>
            </nav>

            <div id="zone-connexion">
                <div id="logo-client-div" >
                    <img  id="logo-client-img" src="{!! asset('/images/logo-maintronic.png') !!}" alt="logo client">
                </div>

                <div>
                    <p>Nom Client</p>
                    <p>
                        <a href="#">Mon compte</a>
                        -
                        <a href="#">Se déconnecter</a>
                    </p>
                </div>

            </div>


        </header>

        <hr>
