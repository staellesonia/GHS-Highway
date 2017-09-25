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
           <h2 style="font-family:Candara"> Table des données de clients modifiées  </h2><br>
<?php


//include "../includes/bdd_connect.inc.php";
include "../includes/test_bdd_connect.cons.php";

extract($_POST);
extract($_SESSION) ;

$nom=addslashes($f_nom);
$prenom=addslashes($f_prenom);
$numbadge=addslashes($f_numbadge);
//$numcli=addslashes($f_numcli);
$mail=addslashes($f_mail);
$adresse=addslashes($f_adresse);
$cp=addslashes($f_cp);
$ville=addslashes($f_ville);
$rib=addslashes($f_rib);

$sqlentete="desc abonnement";
$resultat=$dbh->query($sqlentete);
$entetes = $resultat->fetchAll();
$resultat->closeCursor();

$sql = "UPDATE `abonnement`
        SET `Adresse` = '$adresse',
        `Code Postal` = '$cp',
        `Ville` = '$ville',
        `MAIL` = '$mail'
        `RIB` = '$rib'
        WHERE `NUMERO_DE_BADGE`='$numbadge'";

//$sqlcons = "UPDATE `tt_clients`
//        SET `AdresseClient` = '$adresse',
  //      `CodePostalClient` = '$cp',
    //    `VilleClient` = '$ville',
  //      `Mail` = '$mail',
  //      `RIB` = '$rib'
  //      WHERE `NUMERO_DE_BADGE`='$numbadge' AND `NumeroClient`='$numcli'";

$sql1 = "select * FROM `abonnement` where `NUMERO_DE_BADGE`='$numbadge'";  

$count=$dbh->exec($sql);
//$count1=$dbh2->exec($sql);
//$count2=$dbh2->exec($sqlcons);
$result=$dbh->query($sql1);

$rows=$result->fetchAll();
$nbRows=$result->rowCount();
$nbCols=$result->columnCount();


if(! $count)
          {
            echo "<br>","Modification non effectué dans la table de clients....","<hr>"; }
     else
          {
            echo "<br>","Modification effectué  dans la table de clients....<br>";
              echo "<table class=\"table table-striped\">";

             echo "<thead>";
                   echo "<tr>";
                      foreach($entetes as $entete) {
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

            }

?>
          <br>
          <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                <a href="../concessionnaire.php">Retour à la page précédente</a>
    </section>
          <?php include("../footer.php"); ?>

       </div>
  </body>
</html>
