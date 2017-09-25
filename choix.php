<?php
session_start(); //pour enregistrer la variable de session
  //Reception du formulaire login
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

             <?php


              include "test_connection_concess.php";
              if(! isset($_POST["f_login"]))
              {
                die ("Pas de formulaire trouvé");

              }

            //tester le login  le password et récupérer dans la bdd le TypeUtilisateur et le NumeroParking puis rediriger vers la bonne page prestataire.php ou concessionnaire.php ou employe.php


               $login=$_POST["f_login"];
               $password=$_POST["f_password"];
                $sql="SELECT * FROM `utilisateurs` WHERE Login='$login' and Password='$password'";

                $result=$dbh->query($sql);
                $rows=$result->fetchAll();


                    if($rows==false)
                    {

                      echo "Votre login ou mot de passe est incorrect ..";
                    }
                    else
                    {
                    foreach($rows as $v){
                                $_SESSION["Type_utilisateurs"]= $v[1];
                                 $_SESSION["Login"]=$login;
                                 //$_SESSION["NumeroParking"]= $v[0];

                                 if($_SESSION["Type_utilisateurs"]=="prestataire")
                                 {
                                    header('location:prestataire.php');

                                 }
                                 elseif ($_SESSION["Type_utilisateurs"]=="concessionnaire")
                                 {
                                  header ('location:concessionnaire.php');
                                 }
                                 elseif ($_SESSION["Type_utilisateurs"]=="admin")
                                 {
                                  header ('location:admin.php');
                                 }
                                 else
                                 {
                                  header('location:employe.php');
                                 }
                           }

                    }
               ?>
                            <br>
                            <hr>
                            <br>
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                            <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">Retour à la page précédente</a>
                </section>
               <?php include("footer.php"); ?>
   </div>
</body>
</html>
