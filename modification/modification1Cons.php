<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
      <link rel="stylesheet" href="../styles/style1.css" type="text/css" />
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >

  <title></title>
  </head>

  <body>
     <div id="bloc_page">
        <?php include("headermodif.php"); ?>

        <section style="height:750px">
            <h2 style="font-family:Candara"> Modification des données </h2><br>

                <?php
                 include "../test_bdd_connect.cons.php" ;
                 if(!isset($_REQUEST["f_nom"])){
                    echo "Pas de formulaire trouvé...";

                 }

                 extract($_POST);
                 extract($_SESSION) ;
                 $nom=addslashes($f_nom);
                 $prenom=addslashes($f_prenom);

                 $sqlentete="desc abonnement";
                 $resultat=$dbh->query($sqlentete);
                 $entetes = $resultat->fetchAll();
                 $resultat->closeCursor();

                 $sql = "select * FROM `abonnement` where `Nom`='$nom' AND `Prenom`='$prenom'";
                 $result=$dbh->query($sql);
                 $rows=$result->fetchAll();
                 $nbRows=$result->rowCount();
                 $nbCols=$result->columnCount();

                 foreach($rows as $v){
                     echo "Table de clients au nom : $v[3] $v[2] <br>";
                 }
                 ?>




                  <table class="table table-striped">

             <thead>
                   <tr>
                   <?php    foreach($entetes as $entete) {
                          echo "<td>";
                            echo $entete['Field'];
                                    echo "</td>";
                                }
                             echo "</tr>";
                       echo   "</thead>";

                       echo  "<tbody>";
                          foreach($rows as $v){
                             echo "<tr>";
                                for($i=0; $i<$nbCols; $i++){
                                    $style="AlignGauche";
                                    $valeur=$v[$i];
                                    if(is_numeric($valeur)){
                                        $valeur=number_format($valeur, 0, '', ' ');
                                        $valeur=str_replace(' ', '&nbsp;', $valeur);
                                        $style="AlignDroite";
                                    }
                                    echo "<td class=$style>" ,$valeur, "</td>";
                                }
                             echo "</tr>\n";
                          }
                           echo  "</tbody>";
                      echo "</table>";

            ?>


                 <?php

                  if(!$rows){
                       echo "<br>","Votre client n'existe pas dans notre base de données...<br><br>";
                  }

                  else {
                       include("formModif_clientCons.php");
                  }
            ?>
             <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                <a href="../concessionnaire.php">Retour à la page précédente</a>

      </section>


          <?php include("../footer.php"); ?>

       </div>
  </body>
</html>
