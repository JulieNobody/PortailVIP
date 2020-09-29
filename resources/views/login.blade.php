<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <title> Maintronic - Login</title>
       <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
       <link href="{!! asset('../resources/css/login.css') !!}" rel="stylesheet" type="text/css" >


       <script type="text/javascript">
            $(document).ready(function(){
                //Script pour empêcher de déplacer les éléments de la page
                $(document).on('dragstart', function(event) { event.preventDefault(); });
                //Script pour empêcher le clic droit sur l'image
                $('#monImage').bind("contextmenu",function(){return false;});
            });
        </script>

    </head>
    <body>

        <div id="loginFullPage">
            <form method="post" action="{{ route('login') }}">
                @csrf

                <div id="loginContainer">

                    <div id="logoLogin" >
                        <img id="monImage" src="{!! asset('/images/logo-maintronic.png') !!}" alt="logo Maintronic" >
                    </div>

                    <!--<label for="inputEmail">Pseudo ou Email</label>-->
                    <input id="CodeUtil" type="text" class="form-control @error('CodeUtil') is-invalid @enderror" name="CodeUtil" value="{{ old('CodeUtil') }}" required autocomplete="CodeUtil" autofocus placeholder="Nom d'utilisateur">



                    <!--<label for="inputPassword">Password</label>-->
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe">

                                    @error('CodeUtil')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                    <button type="submit" class="boutonOrange" >Se connecter</button>

                    <!--
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif-->

                </div>

            </form>
        </div>

    </body>
</html>
