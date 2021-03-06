    <body onload="checkbox()">

        <header>
            <a href="{{route('interventions')}}">
                <img id="logo" src="{!! asset('/images/logo-maintronic.png') !!}" alt="logo Maintronic">
            </a>


            <nav>

               @if (Request::path() == "interventions" || Request::path() == "interventions/filtres")
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

                @if (auth()->user()->Acces[2] == 1)
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
                @endif

                @if (auth()->user()->Acces[3] == 1)
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
                @endif
            </nav>

            <div id="zone-connexion">
                @guest
                    <p>Vous n'etes pas connecté</p>
                @endguest

                @auth  <!-- test si user conecté -->


                    @if (Auth::user()->LogoClient != NULL)
                        <img  id="logo-client-img" src="{{ asset('images/logoClient/'. Auth::user()->LogoClient) }}" alt="logo client">
                    @endif

                    <div>
                        <p id="nomClient">{{ Auth::user()->NomUtil }}</p>
                        <p>
                            @if (auth()->user()->Acces[5] == 1)
                                <a href="{{route('mon-compte')}}">Mon compte</a>

                            -
                            @endif
                            <a
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                            >
                            {{ __('Se déconnecter') }}
                            </a>
                            <br>
                            <br>    {{-- FIXME gèrer espace en CSS --}}
                            <br>
                            <br>

                            @if (auth()->user()->Acces[8] == 1)
                                <a href="{{route('admin-liste')}}">Admin</a>
                            @endif


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </p>
                    </div>
                @endauth
            </div>
        </header>
        <hr>
