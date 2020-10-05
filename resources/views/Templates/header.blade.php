<!DOCTYPE html>
<html>
    <head>
        <title> @yield('title')</title>
        <link href="{!! asset('../resources/css/app.css') !!}" rel="stylesheet" type="text/css" >
        <link href="{!! asset('../resources/css/header-footer.css') !!}" rel="stylesheet" type="text/css" >
        <link href="{!! asset('../resources/sass/dist/tableau.css') !!}" rel="stylesheet" type="text/css" >

    </head>

    <body>

        <header>
            <img id="logo" src="{!! asset('/images/logo-maintronic.png') !!}" alt="logo Maintronic">

            <nav>

               @if (Request::path() == "interventions")
                    <a href="{{route('interventions')}}" class='nav-lien-cle-curent'>
                        <br>
                        <p>Interventions</p>
                    </a>
                @else
                    <a href="{{route('interventions')}}" class='nav-lien-cle'>
                        <br>
                        <p>Interventions</p>
                    </a>
                @endif

                @if (Request::path() == "pieces-detachees")  <!-- //TODO modifier nom page -->
                    <a href="{{route('pieces-detachees')}}" class='nav-lien-caddie-curent'>
                        <br>
                        <p>Pièces détachées</p>
                    </a>
                @else
                    <a href="{{route('pieces-detachees')}}" class='nav-lien-caddie'>
                        <br>
                        <p>Pièces détachées</p>
                    </a>
                @endif

                @if (Request::path() == "support") <!-- //TODO modifier nom page -->
                    <a href="{{route('support')}}" class='nav-lien-casque-curent'>
                        <br>
                        <p>Support</p>
                    </a>
                @else
                    <a href="{{route('support')}}" class='nav-lien-casque'>
                        <br>
                        <p>Support</p>
                    </a>
                @endif
            </nav>

            <div id="zone-connexion">
                @guest
                    <p>Vous n'etes pas connecté</p>
                @endguest

                @auth  <!-- test si user conecté -->


                    @if (Auth::user()->LogoClient != NULL)
                        <img  id="logo-client-img" src="images/logoClient/{{Auth::user()->LogoClient}}" alt="logo client">
                    @endif

                    <div>
                        <p id="nomClient">{{ Auth::user()->NomUtil }}</p>
                        <p>
                            <a href="{{route('mon-compte')}}">Mon compte</a>
                            -
                            <a
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                            >
                            {{ __('Se déconnecter') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </p>
                    </div>
                @endauth
            </div>
        </header>
        <hr>
