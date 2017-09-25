<?php
   // création de la connexion vers MySQL via PDO (à vérifier dans icon warmp -> php -> extensions php si PDO est activé)
    // définir les variables de connexion
    $server="localhost";
    $user="root";
    $password="";
    $base="ghs-highway";

    // dbh=variable de connexion sur le serveur
    try{
       $dbh=new PDO("mysql:host=$server;dbname=$base;charset=utf8",$user,$password);
    }
    catch(PDOException $e){                        //catch: on intercepte l'erreur
       die("Erreur : ".$e -> getMessage());        // réponse avec un message d'erreur (si la connexion à BDD est échoué)
    }
    //echo "Connexion OK";
?>
