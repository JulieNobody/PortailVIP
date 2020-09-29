@extends('Templates\template')

@section('contenu')
    <h1>Mon compte</h1>

    <ul>
        <li>Nom client : {{ Auth::user()->NomUtil }}</li>
        <li>Id client : {{ Auth::user()->id }}</li>
        <li>Contrat : {{ Auth::user()->AgContrat }}</li>
        <li>Fichier logo : {{ Auth::user()->LogoClient }}</li>
    </ul>

    <img  id="logo-client-img" src="/images/logoClient/{{Auth::user()->LogoClient}}" alt="logo client">




    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
         ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
         laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
         voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
         non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>


@endsection
