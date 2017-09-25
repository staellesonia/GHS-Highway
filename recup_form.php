<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
      <link rel="stylesheet" href="styles/style1.css" type="text/css" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"

  <title></title>

  </head>
  <body>
     <div id="bloc_page">
        <?php include("header.php"); ?>

        <section style="height:750px">
            <h2 style="font-family:Candara"> La base de donnée des abonnés </h2>
            <br>


            <?php

            extract($_POST);
            extract($_SESSION) ;

             if(empty($_POST["f_nom"])){
                die("Veuillez remplir le champs Nom");
             }
             if(empty($_POST["f_prenom"])){
                die("Veuillez remplir le champs Prénom");
             }
             if(empty($_POST["f_mail"])){
                die("Veuillez remplir le champs Mail");
             }
             if(empty($_POST["f_adresse"])){
                die("Veuillez remplir le champs Adresse");
             }
             if(empty($_POST["f_cp"])){
                die("Veuillez remplir le champs Code Postal");
             }
             if(empty($_POST["f_ville"])){
                die("Veuillez remplir le champs Ville");
             }
             if(empty($_POST["f_rib"])){
                die("Veuillez remplir le champs RIB");
             }



             $nom=addslashes($f_nom);
             $prenom=addslashes($f_prenom);
             $mail=addslashes($f_mail);
             $adresse=addslashes($f_adresse);
             $cp=addslashes($f_cp);
             $ville=addslashes($f_ville);
             $rib=addslashes($f_rib);
             //$TypeBadge=$f_type;
             $NUMERO_DE_BADGE="";

             //include "includes/test_bdd_connect.inc.php" ;
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


           if ($nbRep == false){
                  $count=$dbh->exec($sql2);

                   $id=$dbh->lastInsertId();
                  $NUMERO_DE_BADGE=$id;
                  }
                   $sql3= "INSERT INTO `abonnement` (`NUMERO_DE_BADGE`, `Nom`, `Prenom`,`MAIL`, `Adresse`, `CodePostal`, `Ville`, `RIB`)
                         VALUES ('', '$nom', '$prenom','$mail', '$adresse', '$cp', '$ville', $rib)";
                $count2=$dbh->exec($sql3);
                 echo "Le client $nom n'existe pas, nous allons créer son numéro de client et son badge. Son badge est : $id.";
                  echo "<br><hr><br><br>";



            //      $sql3="INSERT INTO `badges` (`NumeroParking`, `NumeroBadge`, `NumeroClient`, `TypeBadge`, `DebutValiditeBadge`, `FinValiditeBadge`)
          //               VALUES ('$NumeroParking', '', '$NumeroClient', '$TypeBadge', CURRENT_TIMESTAMP, '') ";
          //        $req1=$dbh->exec($sql3);
          //        $id2=$dbh->lastInsertId();
        //          $NumeroBadge=$id2;

          //        $sql3cons="INSERT INTO `tt_badges` (`NumeroParking`, `NumeroBadge`, `NumeroClient`, `TypeBadge`, `DebutValiditeBadge`, `FinValiditeBadge`)
          //                   VALUES ('$NumeroParking', '$NumeroBadge', '$NumeroClient', '$TypeBadge', CURRENT_TIMESTAMP, '') ";
          //        $req2=$dbh2->exec($sql3cons);



               }
                le client existe : créer juste le badge
               else{
		foreach($rows as $z){
                $NUMERO_DE_BADGE=$z[0];
	//	$NumeroClient=$z[1];
	//	$nom=$z[2];

             }


             $sql4="INSERT INTO `abonnement` (`NUMERO_DE_BADGE`, `Nom`, `Prenom`,`MAIL`, `Adresse`, `Code Postal`, `Ville`, `RIB`)
                     VALUES ('', '$nom', '$prenom','$mail', '$adresse', '$cp', '$ville', $rib)";
                  $req1=$dbh->exec($sql4);
                  $id2=$dbh->lastInsertId();
                  $NUMERO_DE_BADGE=$id2;
                  echo "Le client $nom existe. Nous allons créer son nouveau badge. Son nouveau numéro de badge est : $id2.";
                 echo "<br><hr><br><br>";

    //              $sql3cons="INSERT INTO `tt_badges` (`NumeroParking`, `NumeroBadge`, `NumeroClient`, `TypeBadge`, `DebutValiditeBadge`, `FinValiditeBadge`)
      //                       VALUES ('$NumeroParking', '$NumeroBadge', '$NumeroClient', '$TypeBadge', CURRENT_TIMESTAMP, '') ";
      //            $req2=$dbh2->exec($sql3cons);

               }

              //Afficher la table des abonnés

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

                <hr>
                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">Retour à la page précédente</a>
        </section>
          <?php include("footer.php"); ?>


       </div>
  </body>
</html>
