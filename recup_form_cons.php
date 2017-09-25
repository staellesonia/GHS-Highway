<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"

  <title></title>
  <style>
      .AlignDroite{text-align:right;padding-right:7px}
      .AlignGauche{text-align:left;padding-right:7px}
  </style>

  <script>
           function supprimer(){

                window.open("supprimer1.php","mywin","left=10,top=10,width=800,height=640,scrollbars=yes");     // ouvre une fenêtre vièrge qui s'appelle mywin

            }

  </script>
  </head>
  <body>

   <div id="bloc_page">
        <header>
        <div id="logo">
            <img src="images/logo.png"/>
        </div>
        </header>

        <section style="height:750px">
            <h2 style="font-family:Candara"> La base de donnée des abonnés </h2>
            <br>

    <?php

     if(!isset($_REQUEST["f_nom"])){
        die("Pas de formulaire trouvé...");
     }

     foreach($_POST as $k=>$v){
        echo $k, " : " , $v, "<br>";
     }     


     extract($_POST);
     extract($_SESSION) ;

     $nom=addslashes($f_nom);
     $prenom=addslashes($f_prenom);
     $mail=addslashes($f_mail);
     $adresse=addslashes($f_adresse);
     $cp=addslashes($f_cp);
     $ville=addslashes($f_ville);
     $rib=addslashes($f_rib);
     //$TypeBadge=$f_type;
     $NUMERO_DE_BADGE="";




     //include "includes/bdd_connect.inc.php" ;
     include "includes/test_bdd_connect.cons.php" ;
     $sql1="SELECT * FROM abonnement WHERE MAIL='$mail'" ;
     $req=$dbh->query($sql1);
     $nbRep=$req->rowCount();
     $rows=$req->fetchAll();

     foreach($rows as $z){
        $NUMERO_DE_BADGE=$z[0];
        echo "Le numéro du badge est : ", $z[0],".<br>";
     }

     // insérer dans la table abonnement

     $sql2= "INSERT INTO `abonnement` (`NUMERO_DE_BADGE`, `Nom`, `Prenom`,`MAIL`, `Adresse`, `Code Postal`, `Ville`, `RIB`)
             VALUES ('', '$nom', '$prenom','$mail', '$adresse', '$cp', '$ville', $rib)";


      // le client n'existe pas : créer le client puis créer le badge en récupérant le lastId

       if ($nbRep <=0){
          $count=$dbh->exec($sql2);

          $id=$dbh->lastInsertId();
            $NUMERO_DE_BADGE=$id;
          $sql3= "INSERT INTO `abonnement` (`NUMERO_DE_BADGE`, `Nom`, `Prenom`,`MAIL`, `Adresse`, `Code Postal`, `Ville`, `RIB`)
                  VALUES ('', '$nom', '$prenom','$mail', '$adresse', '$cp', '$ville', $rib)";
          $count2=$dbh->exec($sql3);
          echo "Le client n'existe pas.<br>";
          echo "On va créer le client et son badge.<br>";
          echo "Numéro de badge est : $id.<br>";
          echo "<hr>";

          //$sql3="INSERT INTO `badges` (`NumeroParking`, `NumeroBadge`, `NumeroClient`, `TypeBadge`, `DebutValiditeBadge`, `FinValiditeBadge`)
        //         VALUES ('$NumeroParking', '', '$NumeroClient', '$TypeBadge', CURRENT_TIMESTAMP, '') ";
        //  $req1=$dbh->exec($sql3);
        //  $id2=$dbh->lastInsertId();
        //  $NumeroBadge=$id2;

        //  $sql3cons="INSERT INTO `tt_badges` (`NumeroParking`, `NumeroBadge`, `NumeroClient`, `TypeBadge`, `DebutValiditeBadge`, `FinValiditeBadge`)
        //             VALUES ('$NumeroParking', '$NumeroBadge', '$NumeroClient', '$TypeBadge', CURRENT_TIMESTAMP, '') ";
        //  $req2=$dbh2->exec($sql3cons);
       }
       // le client existe : créer juste le badge
       else{
          echo "Le client existe.<br>";
          echo "On va créer son badge.<br>";
          echo "<hr>";

          $sql4="INSERT INTO `abonnement` (`NUMERO_DE_BADGE`, `Nom`, `Prenom`,`MAIL`, `Adresse`, `Code Postal`, `Ville`, `RIB`)
                  VALUES ('', '$nom', '$prenom','$mail', '$adresse', '$cp', '$ville', $rib)";
          $req1=$dbh->exec($sql4);
          $id2=$dbh->lastInsertId();
          $NumeroBadge=$id2;

        //  $sql3cons="INSERT INTO `tt_badges` (`NumeroParking`, `NumeroBadge`, `NumeroClient`, `TypeBadge`, `DebutValiditeBadge`, `FinValiditeBadge`)
          //           VALUES ('$NumeroParking', '$NumeroBadge', '$NumeroClient', '$TypeBadge', CURRENT_TIMESTAMP, '') ";
          //$req2=$dbh2->exec($sql3cons);
       }

        // Afficher la table des abonnés



        //récupérer l'entête
       $sqlentete="desc abonnement";
       $resultat=$dbh->query($sqlentete);
       $entetes = $resultat->fetchAll();
       $resultat->closeCursor();

       $sql5="SELECT `abonnement`.`ID_ABONNEMENT`,`abonnement`.`NUMERO_DE_BADGE`,`abonnement`.`Nom`,`abonnement`.`Prenom`,`troncon`.ID_TRONCON, `troncon`.`DISTANCE`
       FROM `abonnement`,`troncon`
       WHERE `troncon`.`ID_ABONNEMENT` = `abonnement`.`ID_ABONNEMENT` and `troncon`.`NUMERO_DE_BADGE` = `abonnement`.`ID_TRONCON`";

       $table=$dbh->query($sql5);
       $ligne=$table->fetchAll();

       $nbLigne=$table->rowCount();
       $nbColonne=$table->columnCount();


       echo "<table class=\"table table-striped\">";
         // les entêtes
         echo "<thead>";
               echo "<tr>";
                  foreach($entetes as $entete) {
                      echo "<td>";
                        echo $entete['Field'];
                      echo "</td>";
                  }
               echo "</tr>";
         echo   "</thead>";

         // contenue de la table
         echo  "<tbody>";
            foreach($ligne as $v){
               echo "<tr>";
                  for($i=0; $i<$nbColonne; $i++){
                      $style="AlignGauche";
                      $valeur=$v[$i];             // la variable valeur représente les colonnes
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

    //br>
    //hr>

    //form target="" name="f" method="POST" action="supprimer1.php">
    //select name="NumeroParking" size="1" class="form-control">
       ?php
                $numPar="select distinct NumeroParking from clibadge order by NumeroParking";
                $resultat=$dbh2->query($numPar);
                $rowsresul=$resultat->fetchAll();
                foreach($rowsresul as $v){
                    echo "<option value=\"$v[NumeroParking]\">$v[NumeroParking]</option>" ;
                }
              ?>
    /select>

     select name="NumeroClient" size="1" class="form-control">
        ?php
                $numCli="select distinct NumeroClient from clibadge order by NumeroClient";
                $resultat1=$dbh2->query($numCli);
                $rowsresul1=$resultat1->fetchAll();
                foreach($rowsresul1 as $v){
                    echo "<option value=\"$v[NumeroClient]\">$v[NumeroClient]</option>" ;
                }
              ?>
    /select>

     select name="NumeroBadge" size="1" class="form-control">
        ?php
                $numBad="select distinct NumeroBadge from clibadge order by NumeroBadge";
                $resultat2=$dbh2->query($numBad);
                $rowsresul2=$resultat2->fetchAll();
                foreach($rowsresul2 as $v){
                    echo "<option value=\"$v[NumeroBadge]\">$v[NumeroBadge]</option>" ;
                }
              ?>
              br>
                hr>
                span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">Retour à la page précédente</a>
    /select>
     button id="action" class="btn btn-default" onClick="supprimer()">Supprimer</button><br />
   /form>

 /section>


          <footer>
          <div class="contact">
            <h5>Tel.:01 30 12 30 60<br>
            Adresse: 14 Villa de Lourcine <br>
            75014 PARIS
            </h5>
          </div>
          <div class="Mentions"> <a href="mentionslegales.html">Mentions légales</a>
          </div>
         </footer>


       </div>
  </body>
</html>
