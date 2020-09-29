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
            <form method="post">


                <div id="loginContainer">

                    <div id="logoLogin" >
                        <img id="monImage" src="{!! asset('/images/logo-maintronic.png') !!}" alt="logo Maintronic" >
                    </div>

                    <!--<label for="inputEmail">Pseudo ou Email</label>-->
                    <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Nom d'utilisateur" required>

                    <!--<label for="inputPassword">Password</label>-->
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>

                    <button type="submit" class="boutonOrange" >Se connecter</button>

                </div>

            </form>
        </div>
    </body>
</html>
