<div id="tabs">
                      <ul  class="nav nav-tabs">
                          <li class="active"><a href="#tabs-1">Abonnement</a></li>
                          <li><a href="#tabs-2">Clients</a></li>
                          <li><a href="#tabs-3">Chiffre d'affaire</a></li>
                          <li><a href="#tabs-4">Import</a></li>
                          <li><a href="#tabs-5">Vider les tables temporaires</a></li>
                      </ul>
                      <div id="tabs-1" class="tab-content">
                        <?php include("form.php"); ?>
                      </div>
                      <div id="tabs-2" class="tab-content">
                         <?php include("./modification/modifCons.php"); ?>
                      </div>
                        <div id="tabs-3" class="tab-content">
                        <?php include("chiffreAffaire.php"); ?>
                         </div>
                      <div id="tabs-4" class="tab-content">
                         <?php include("import.php"); ?>
                      </div>
                       <div id="tabs-5" class="tab-content">
                         <?php include("vide.php"); ?>
                      </div>
</div>
