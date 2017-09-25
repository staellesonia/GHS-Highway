<header>
              <div id="logo">
                  <img src="../images/logo.png"/>
                   <?php
                        $identifiant=$_SESSION['Login'];
                        $parking=$_SESSION['NumeroParking'];
                        echo "<h4> Bonjour $identifiant </h4>" ;
                                        
                       ?> 
                      <a href="../accueil.php">Déconnexion</a>
                  </div>
  </header>
