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
  
   <title>Interface de l'employé</title>
  </head>
    
  <body> 
   
   <div id="bloc_page">
      <?php include("header.php");?>       
        
      <section style="height:700px">
      
            <h2 style="font-family:Candara"> Interface de gestion de l'employé </h2>                                   
            <hr width=20%, style="color:black"><br>
             
             
       <div id="tabs">
                      <ul  class="nav nav-tabs">
                          <li class="active"><a href="#tabs-1">Abonnement</a></li>
                          <li><a href="#tabs-2">Clients</a></li>                          
                      </ul>
                      
                      <div id="tabs-1" class="tab-content">
                        <?php include("form.php"); ?>
                      </div>
                      
                      <div id="tabs-2" class="tab-content">
                         <?php include("./modification/modif.php"); ?>
                      </div>
      
       </div> 
                 
       </section>
         
       <?php include("footer.php"); ?>
    
    </div>
   </body>
</html>
