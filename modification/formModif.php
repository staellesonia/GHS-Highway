<form name="f_modif" target="" method="POST" action="./modification3.php">


                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
                    <div class="col-sm-10">
                      <input type="text" required class="form-control" id="Nom" name="f_nom" value=<?php echo "$nom" ?> readonly>
                    </div>
                  </div>



                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Prénom</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name='f_prenom' id="Pom"  value=<?php echo "$prenom" ?> readonly>
                 </div>
                </div>


                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">No Badge</label>
                    <div class="col-sm-10">
                      <input type="text" required class="form-control" id="numérobadge" name="f_numbadge" value=<?php echo "$numbadge" ?> readonly>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">No client</label>
                    <div class="col-sm-10">
                      <input type="text" required class="form-control" id="numéroclient" name="f_numcli" value=<?php echo "$numcli" ?> readonly>
                    </div>
                  </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Mail</label>
                  <div class="col-sm-10">
                  <input type="email" class="form-control" id="Mail" name="f_mail" value=<?php echo "$mail" ?>>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Adresse</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="Adresse" name="f_adresse" value=<?php echo "$adresse" ?>>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Code postal</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="Code postal" name="f_cp" value=<?php echo "$cp" ?>>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Ville</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="Ville" name="f_ville" value=<?php echo "$ville" ?>>
                  </div>
              </div>



                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button id="action" type="submit" class="btn btn-default" onClick="envoiForm()">Sauvegarder</button>
                    </div>
                  </div>

                </table>
                </form>
