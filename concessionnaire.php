<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

  <head>
  <meta charset="UTF-8">
   <link rel="stylesheet" href="styles/style1.css" type="text/css" />
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
  <title>Concessionnaire</title>


  </head>

   <body>

   <div id="bloc_page">

          <header>
              <div id="logo">
                  <img src="images/logo.png"/>
                   <?php
                        $identifiant=$_SESSION['Login'];
                      //  $parking=$_SESSION['NumeroParking'];
                        echo "<h4> Bonjour $identifiant </h4>" ;

                       ?>
                      <a href="./autoroute.php">Déconnexion</a>
                  </div>
        </header>

        <section style="height:700px">
            <h2 style="font-family:Candara"> Interface de gestion de concessionnaire </h2>
            <hr width=20%, style="color:black"><br>
            <?php include("menuconcessionnaire.php"); ?>
        </section>

         <?php include("footer.php"); ?>

       </div>
   </body>
  </html>
