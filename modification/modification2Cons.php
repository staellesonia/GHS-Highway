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
            <h2 style="font-family:Candara"> Nouveau formulaire  </h2><br>

            <?php
                 //include "../includes/bdd_connect.inc.php" ;
                 include "../includes/test_bdd_connect.cons.php" ;

                 extract($_POST);
                 extract($_SESSION) ;
                 $nom=addslashes($f_nom);
                 $prenom=addslashes($f_prenom);
                 $numbadge=addslashes($f_numbadge);
                 //$numcli=addslashes($f_numcli);


                 if (isset($_POST['modifier'])) {

                     $sql = "select * FROM `abonnement`
                             where `Nom`='$nom' AND `Prenom`='$prenom' and `NUMERO_DE_BADGE`='$numbadge'";
                    // $sql1 = "select * FROM `tt_clients`
                    //         where `NomClient`='$nom' AND `PrenomClient`='$prenom' and `NumeroParking`='$numpar' and `NumeroClient`='$numcli'";

                     $result=$dbh->query($sql);
                  //   $result1=$dbh2->query($sql);
                //     $result2=$dbh2->query($sql1);

                     $rows=$result->fetchAll();
                     $nbRows=$result->rowCount();
                     $nbCols=$result->columnCount();

                     foreach($rows as $v){ echo "$v[3] $v[2]";
                     $mail=addslashes($v[4]);
                     $adresse=addslashes($v[5]) ;
                     $cp=addslashes($v[6])   ;
                     $ville=addslashes($v[7])  ;
                     }
                     if(!$rows){ echo "<br>","Votre client n'existe pas dans notre base de données..."; }
                     else { include("formModifCons.php"); }

                  }

                  elseif (isset($_POST['supprimer'])) {

                      $sql="DELETE FROM `abonnement`
                            WHERE `NUMERO_DE_BADGE` = '$numbadge'";
                    //  $sql2="DELETE FROM `tt_clients`
                    //        WHERE `NumeroParking` = '$numpar' AND `NumeroClient` = '$numcli'";
                    //  $sql3="DELETE FROM `badges`
                    //         WHERE `NumeroParking` = '$numpar' AND `NumeroClient` = '$numcli'";
                  //    $sql4="DELETE FROM `tt_badges`
                    //         WHERE `NumeroParking` = '$numpar' AND `NumeroClient` = '$numcli'";

                    $request1=$dbh->exec($sql);
                  //  $request2=$dbh2->exec($sql1);
                  //  $request3=$dbh->exec($sql3);
                  //  $request4=$dbh2->exec($sql3);
                  //  $request5=$dbh2->exec($sql2);
                  //  $request6=$dbh2->exec($sql4);
                    echo "<br><br>Vous avez supprimé le client numéro $numcli du parking $numpar de la base de donnée !";

                  }


            ?>
                <br>
                <hr>
                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                <a href="../concessionnaire.php">Retour à la page précédente</a>
      </section>
          <?php include("../footer.php"); ?>

       </div>
  </body>
</html>
