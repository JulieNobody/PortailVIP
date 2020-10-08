<!DOCTYPE html>
<html>
    <head>
        <title> @yield('admin-title')</title>
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link href="{!! asset('../resources/css/app.css') !!}" rel="stylesheet" type="text/css" >
        <link href="{!! asset('../resources/css/header-footer.css') !!}" rel="stylesheet" type="text/css" >
        <link href="{!! asset('../resources/sass/dist/tableau.css') !!}" rel="stylesheet" type="text/css" >
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ URL::asset('../resources/js/app.js') }}"></script>
        {{-- FIXME vérifier si link ou script inutile --}}

        <link href="{!! asset('../resources/css/admin.css') !!}" rel="stylesheet" type="text/css" >
    </head>

    <body onload="checkbox()">

        <header>
            <img id="logo" src="{!! asset('/images/logo-maintronic.png') !!}" alt="logo Maintronic">

            <nav class="admin-nav">

                @if (Request::path() == "admin")
                <a href="{{route('admin')}}">
                    <br>
                    <p class="admin-nav-actif">Menu admin</p>
                </a>
                @else
                    <a href="{{route('admin')}}">
                        <br>
                        <p>Menu admin</p>
                    </a>
                @endif

                @if (Request::path() == "admin-creation")
                    <a href="{{route('admin-creation-get')}}">
                        <br>
                        <p class="admin-nav-actif">Création utilisateur</p>
                    </a>
                @else
                    <a href="{{route('admin-creation-get')}}">
                        <br>
                        <p>Création utilisateur</p>
                    </a>
                @endif

                @if (Request::path() == "admin-modification")
                    <a href="{{route('admin-modification-get')}}">
                        <br>
                        <p class="admin-nav-actif">Modification utilisateur</p>
                    </a>
                @else
                    <a href="{{route('admin-modification-get')}}">
                        <br>
                        <p>Modification utilisateur</p>
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
