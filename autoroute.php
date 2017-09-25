<?php
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('Login', '');
setcookie('Password', '');
 ?>
<!DOCTYPE HTML>
<html>

  <head>
  <meta charset="UTF-8">
   <link rel="stylesheet" href="styles/style1.css" type="text/css" />
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >

  <title></title>
  </head>

   <body>

    <div id="bloc_page">
        <header>
              <div id="logo">
                  <img src="images/logo.png"/>

              </div>

        </header>

         <section>

              <h2>Veuillez vous identifier</h2>

              <form name="f_connexion" target="" method="POST" action="choix.php">

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Login</label>
                    <div class="col-sm-10">
                      <input type="text" required class="form-control" name="f_login" placeholder="Identifiant">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mot de passe</label>
                    <div class="col-sm-10">
                      <input type="password" required class="form-control" name="f_password" placeholder="Mot de passe">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Se souvenir de moi
                        </label>
                      </div>

                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Se connecter</button>
                    </div>
                  </div>

                </form>

            </section>
       <?php include("footer.php"); ?>
   </div>
</body>
</html>
