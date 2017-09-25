 <header>
        <div id="logo">
            <img src="./images/logo.png"/>
             <?php
                  $identifiant=$_SESSION['Login'];
                  //$parking=$_SESSION['NumeroParking'];
                  echo "<h4> Bonjour $identifiant </h4>" ;
                  //echo "<h5> Vous êtes dans parking $parking</h5>";
             ?>
                <a href="./autoroute.php">Déconnexion</a>
        </div>
</header>
